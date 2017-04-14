<?php require_once('assets/includes/route.php'); ?>
<?php $title="Home"; 
if(isset($_GET['feed']) && $_GET['feed'] != '' ) {
	$title = $db->escape_value($_GET['feed']);
}
require_once('assets/includes/header.php'); ?>
<?php require_once('assets/includes/navbar.php'); ?>

<div class="container">		

<div class="row">
	<?php require_once('assets/includes/lt_sidebar.php'); ?>
	<div class="col-md-8">
				<?php
			if (isset($_GET['edit']) && isset($_GET['msg']) && $_GET['edit'] == "success") :
			$status_msg = $db->escape_value($_GET['msg']);				
		?>
			<div class="alert alert-success">
				<i class="glyphicon glyphicon-check"></i> <strong><?php echo $lang['alert-type-success']; ?>!</strong>&nbsp;&nbsp;<?php echo $status_msg; ?>
			</div>
		<?php
			endif; 	
			if (isset($_GET['edit']) && isset($_GET['msg']) && $_GET['edit'] == "fail") :
			$status_msg = $db->escape_value($_GET['msg']);		
		?>
			<div class="alert alert-danger">
				<i class="glyphicon glyphicon-times"></i> <strong><?php echo $lang['alert-type-error']; ?>!</strong>&nbsp;&nbsp;<?php echo $status_msg; ?>
			</div>
			
		<?php 
			endif;
		?>

		
		<?php
		if(isset($_GET['notifications']) && $_GET['notifications'] == 'true' ) {
		?>
			
			<?php 
					
					$per_page = "20";
					if (isset($_GET['page']) && is_numeric($_GET['page']) ) {
							$page= $_GET['page'];
					} else {
							$page=1;
					}
					
					$total_count = Notif::count_everything(" AND user_id = '{$current_user->id}' ");
					$pagination = new Pagination($page, $per_page, $total_count);
					$notif = Notif::get_everything(" AND user_id = '{$current_user->id}' ORDER BY created_at DESC LIMIT {$per_page} OFFSET {$pagination->offset()} ");
					
					if($notif) {
						foreach($notif as $n) {
							$string = str_replace('\\','',$n->msg);
							$link = $n->link;
							if(strpos($link , '#')) {	//There's a hash!
								$linkarr = explode('#' , $link);
								$link = $linkarr[0] . "&notif={$n->id}#" . $linkarr[1];
							} else {
										$link .= "&notif={$n->id}";
									}
							echo "<p class='label label-danger'>" . date_ago($n->created_at) . "</p>";
							echo "<h5 onclick=\"location.href='{$link}';\" style='";
							if($n->viewed == '0') {
								echo ' background-color: #edf2fa; ';
							}
							echo " line-height:35px;border-bottom:1px solid #dedede; cursor:pointer '><i class='fa fa-globe'></i>&nbsp;&nbsp;{$string}</h5>";
						}
					} else {
				?>
				<h3 style="color:#b0b0b0"><center><i class="glyphicon glyphicon-bullhorn"></i><br><?php echo $lang['index-notification-no_results']; ?></center></h3><br><br>
				<?php } ?>
			
		<?php
		} elseif(isset($_GET['leaderboard']) && $_GET['leaderboard'] == 'true' ) {
		?>
			
			<?php 
					
					$per_page = "20";
					if (isset($_GET['page']) && is_numeric($_GET['page']) ) {
							$page= $_GET['page'];
					} else {
							$page=1;
					}
					
					$total_count = User::count_everything(" AND id != '1000' ");
					$pagination = new Pagination($page, $per_page, $total_count);
					$notif = User::get_everything(" AND id != '1000' ORDER BY points DESC LIMIT {$per_page} OFFSET {$pagination->offset()} ");
					
					$i= (($page-1) * $per_page) + 1;
					
					if($notif) {
						?>
						<h3 class=""><?php echo $lang['pages-leaderboard-title']; ?></h3>
						<table class="table table-hover">
						  <tbody>
							<?php 
								
								foreach($notif as $u) :
									if($u->avatar) {
										$img = File::get_specific_id($u->avatar);
										$quser_avatar= WEB_LINK."assets/".$img->image_path();
										
										$quser_avatar_path = UPLOADPATH."/".$img->image_path();
										if (!file_exists($quser_avatar_path)) {
											$quser_avatar = WEB_LINK.'assets/img/avatar.png';
										}
										
									} else {
										$quser_avatar = WEB_LINK.'assets/img/avatar.png';
									}
							?>
							<tr>
							  <td style="font-size:20px;font-weight:bold;width:50px">#<?php echo $i; ?></td>
							  <td style="font-size:20px">
								<a href="<?php echo $url_mapper['users/view']. $u->id; ?>/section=points" style="text-decoration:none"><img src="<?php echo $quser_avatar; ?>" class="img-circle" style="float:<?php echo $lang['direction-left']; ?>; height:70px; width:auto; margin-top:-4px; ">&nbsp;&nbsp;<?php echo $u->f_name . ' ' . $u->l_name; ?><br>&nbsp;&nbsp;&nbsp;<span style="color:grey"><?php echo $u->points; ?> <?php echo $lang['index-leaderboard-points']; ?></span>
							  </td>
							</tr>
							
							<?php 
								$i++;
								endforeach;
							?>
						  </tbody>
						</table>

						
						<?php
					}
		
		} else {
		
		
		if($current_user->can_see_this('index.post',$group)) {
		?>
		
		
		<form action="<?php echo $url_mapper['questions/create'] ?>" method="post" role="form" enctype="multipart/form-data" class="facebook-share-box">
		<div class="">
			<ul class="post-types">
				<li class="post-type">
					<p class="publisher">
						<img src="<?php echo $user_avatar; ?>" class="img-circle" style="float:<?php echo $lang['direction-left']; ?>;width:46px;margin-<?php echo $lang['direction-right']; ?>:10px">
						<p class="name">
							<a href="<?php echo $url_mapper['users/view'] . $current_user->id; ?>/"><?php echo $current_user->f_name . ' ' . $current_user->l_name; ?></a>
						</p>
					</p>
				</li>
			</ul>
			<div class="share">
				<div class="arrow"></div>
				<div class="panel panel-default">
                      <div class="panel-body">
                        <div class="">
                            <textarea name="title" cols="40" rows="10" id="status_message" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="<?php echo $lang['index-search-title']; ?>" required></textarea> 
						</div>
                      </div>
						<div class="panel-footer">
							<div class="form-group">
								<input type="submit" name="submit" value="<?php echo $lang['index-question-submit']; ?>" class="btn btn-default">
								<?php 
									$_SESSION[$elhash] = $random_hash;
									echo "<input type=\"hidden\" name=\"hash\" value=\"".$random_hash."\" readonly/>";
								?>
							</div>									
						</div>
                    </div>
			</div>
			</div>
		</form>
		
		
		<?php
		}
		$query = "";
		
		if(isset($_GET['search']) && $_GET['search'] != '' ) {
			
			$searchreq = $db->escape_value($_GET['search']);
			$query = " AND title LIKE '%{$searchreq}%' ";
			echo '<h2 class="page-header name">'. $lang['index-search-questions'] . ': ' . $db->escape_value($_GET['search']) . "</h2>";
			
		}
		
		if(isset($_GET['feed']) && $_GET['feed'] != '' ) {
			$feedreq = $db->escape_value($_GET['feed']);
			$query = " AND feed LIKE '%{$feedreq}%' ";
			echo '<h2 class="page-header name">'. $lang['index-search-questions'] . ': '. $db->escape_value($_GET['feed']);
			$tag = Tag::get_tag($feedreq);
			if($tag) {
				
				$f_follow_class = 'follow';
				$follow_txt = $lang['btn-follow'];
				$followed = FollowRule::check_for_obj('tag' , $tag->id, $current_user->id);
				if($followed) {
					$follow_txt = $lang['btn-followed'];
					$f_follow_class = 'active unfollow';
				}
			
			if($current_user->can_see_this('feed.follow' , $group)) { echo "&nbsp;&nbsp;<a href='#me' class='btn btn-sm btn-default {$f_follow_class}'  name='{$tag->id}' value='{$tag->follows}' data-obj='Tag' data-lbl='{$lang['btn-follow']}' data-lbl-active='{$lang['btn-followed']}'  ><i class='fa fa-user-plus'></i> {$follow_txt} | {$tag->follows}</a>"; }
			}
			echo "</h2>";
		}
		
		$per_page = "20";
		if (isset($_GET['page']) && is_numeric($_GET['page']) ) {
				$page= $_GET['page'];
		} else {
				$page=1;
		}
		
		$total_count = Question::count_feed_for($current_user->id,$query," ");
		$pagination = new Pagination($page, $per_page, $total_count);
		$questions = Question::get_feed_for($current_user->id ,$query," LIMIT {$per_page} OFFSET {$pagination->offset()} " );
		if($questions) {	
			foreach($questions as $q) {
				$user = User::get_specific_id($q->user_id);
				if($user->avatar) {
					$img = File::get_specific_id($user->avatar);
					$quser_avatar = WEB_LINK."assets/".$img->image_path();
					$quser_avatar_path = UPLOADPATH."/".$img->image_path();
					if (!file_exists($quser_avatar_path)) {
						$quser_avatar = WEB_LINK.'assets/img/avatar.png';
					}
				} else {
					$quser_avatar = WEB_LINK.'assets/img/avatar.png';
				}
				
				if($q->anonymous) { $quser_avatar = WEB_LINK.'assets/img/avatar.png'; }
				
				$upvote_class = 'upvote';
				$downvote_class = 'downvote';
				
				$upvote_txt = $lang['btn-like'];
				$liked = LikeRule::check_for_obj('question' , "like" , $q->id, $current_user->id);
				if($liked) {
					$upvote_txt = $lang['btn-liked'];
					$upvote_class = 'active undo-upvote';
					$downvote_class = 'downvote disabled';
				}
				
				$downvote_txt = $lang['btn-dislike'];
				$disliked = LikeRule::check_for_obj('question' , "dislike" , $q->id, $current_user->id);
				if($disliked) {
					$downvote_txt = $lang['btn-disliked'];
					$upvote_class = 'upvote disabled';
					$downvote_class = 'active undo-downvote';
				}
				if(URLTYPE == 'slug') {
					$url_type = $q->slug;
				} else {
					$url_type = $q->id;
				}
		?>
				<div class="question-element">
					<small><?php $str = $lang['index-question-intro']; $str = str_replace('[VIEWS]' , $q->views , $str); $str = str_replace('[ANSWERS]' , $q->answers , $str); echo $str; ?></small>
					<h1 class="title"><a href="<?php echo $url_mapper['questions/view']; echo $url_type; ?>"><?php echo strip_tags($q->title); ?></a></h1>
					<p class="publisher">
						<img src="<?php echo $quser_avatar; ?>" class="img-circle" style="float:<?php echo $lang['direction-left']; ?>;width:46px;margin-<?php echo $lang['direction-right']; ?>:10px">
						<p class="name">
							<?php if($q->anonymous) { echo $lang['user-anonymous']; } else { ?>
							<a href="<?php echo $url_mapper['users/view'] . $q->user_id; ?>/"><?php echo $user->f_name . " " . $user->l_name; ?></a>
							<?php } ?>
							<br><small><?php if($q->updated_at != "0000-00-00 00:00:00") { echo $lang['index-question-updated'] . " " . date_ago($q->updated_at); } else { echo $lang['index-question-created'] . " " . date_ago($q->created_at); }?></small>
						</p>
					</p>
					<br><p>
						<?php $string = strip_tags($q->content);
							if (strlen($string) > 500) {
								// truncate string
								$stringCut = substr($string, 0, 500);
								// make sure it ends in a word so assassinate doesn't become ass...
								$string = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='{$url_mapper['questions/view']}{$url_type}' >({$lang['index-question-read_more']})</a>"; 
							}
							echo profanity_filter($string);?>
					</p>
					<br>
					<?php if($current_user->can_see_this('questions.interact', $group)) { ?><p class="footer question-like-machine">
						<?php if($current_user->can_see_this("answers.create",$group)) { ?><a href="<?php echo $url_mapper['questions/view'] . $url_type; ?>#answer-question" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> <?php echo $lang['index-question-answer']; if($q->answers) {  echo " | {$q->answers}"; } ?></a><?php } ?>
						<?php if($q->user_id != $current_user->id) { ?><a href="#me" class="btn btn-default <?php echo $upvote_class; ?>" name="<?php echo $q->id; ?>" value="<?php echo $q->likes; ?>" data-obj="question" data-lbl="<?php echo $lang['btn-like'] ?>" data-lbl-active="<?php echo $lang['btn-liked']; ?>"  ><i class="glyphicon glyphicon-thumbs-up"></i> <?php echo $upvote_txt; if($q->likes) {  echo " | {$q->likes}"; } ?></a>
						<a href="#me" class="btn btn-default <?php echo $downvote_class; ?>" name="<?php echo $q->id; ?>" value="<?php echo $q->dislikes; ?>" data-obj="question" data-lbl="<?php echo $lang['btn-dislike']; ?>" data-lbl-active="<?php echo $lang['btn-disliked']; ?>"  ><i class="glyphicon glyphicon-thumbs-down"></i> <?php echo $downvote_txt; if($q->dislikes) {  echo " | {$q->dislikes}"; } ?></a><?php } ?>
					</p><?php } ?>
				</div><?php //if(!$current_user->can_see_this('questions.interact', $group)) { echo '<hr style="margin:0">'; } ?>
				<hr style="margin:0">
			<?php }  
		} else {
			?>
			<h3 style="color:#b0b0b0"><center><i class="glyphicon glyphicon-edit"></i><br><?php echo $lang['index-question-no_questions']; ?><br><br><small><a href='<?php echo $url_mapper['questions/create']; ?>'><?php echo $lang['index-question-post']; ?></a></small></center></h3><br><br>
		<?php
		}
		}
			
			if(isset($pagination) && $pagination->total_pages() > 1) {
					?>
					<div class="pagination btn-group">
					
							<?php
							if ($pagination->has_previous_page()) {
								$page_param = $url_mapper['index/'];
								
								if(isset($_GET['notifications']) && $_GET['notifications'] == 'true' ) {
									$page_param = $url_mapper['notifications/'];
								}
								
								if(isset($_GET['leaderboard']) && $_GET['leaderboard'] == 'true' ) {
									$page_param = $url_mapper['leaderboard/'];
								}
							
								if(isset($_GET['feed']) && $_GET['feed'] != '' ) {
									$feedreq = $db->escape_value($_GET['feed']);
									$page_param = $url_mapper['feed/'] . $feedreq. '/';
								}
								$page_param .= $pagination->previous_page();

							echo "<a href=\"{$page_param}\" class=\"btn btn-default\" type=\"button\"><i class=\"glyphicon glyphicon-chevron-{$lang['direction-left']}\"></i></a>";
							} else {
							?>
							<a class="btn btn-default" type="button"><i class="glyphicon glyphicon-chevron-<?php echo $lang['direction-left']; ?>"></i></a>
							<?php
							}
							
							for($p=1; $p <= $pagination->total_pages(); $p++) {
								if($p == $page) {
									echo "<a class=\"btn btn-default active\" type=\"button\">{$p}</a>";
								} else {
									$page_param = $url_mapper['index/'];
									
									if(isset($_GET['notifications']) && $_GET['notifications'] == 'true' ) {
										$page_param = $url_mapper['notifications/'];
									}
								
									if(isset($_GET['leaderboard']) && $_GET['leaderboard'] == 'true' ) {
										$page_param = $url_mapper['leaderboard/'];
									}								
									
									if(isset($_GET['feed']) && $_GET['feed'] != '' ) {
										$feedreq = $db->escape_value($_GET['feed']);
										$page_param = $url_mapper['feed/'] . $feedreq. '/';
									}
									$page_param .= $p;

									echo "<a href=\"{$page_param}\" class=\"btn btn-default\" type=\"button\">{$p}</a>";
								}
							}
							if($pagination->has_next_page()) {
								$page_param = $url_mapper['index/'];
								
								if(isset($_GET['notifications']) && $_GET['notifications'] == 'true' ) {
									$page_param = $url_mapper['notifications/'];
								}
							
								if(isset($_GET['leaderboard']) && $_GET['leaderboard'] == 'true' ) {
									$page_param = $url_mapper['leaderboard/'];
								}
							
								if(isset($_GET['feed']) && $_GET['feed'] != '' ) {
									$feedreq = $db->escape_value($_GET['feed']);
									$page_param = $url_mapper['feed/'] . $feedreq . '/';
								}
								$page_param .= $pagination->next_page();

							echo " <a href=\"{$page_param}\" class=\"btn btn-default\" type=\"button\"><i class=\"glyphicon glyphicon-chevron-{$lang['direction-right']}\"></i></a> ";
							} else {
							?>
							<a class="btn btn-default" type="button"><i class="glyphicon glyphicon-chevron-<?php echo $lang['direction-right']; ?>"></i></a>
							<?php
							}
							?>
					
					</div>
					<?php
					}
			
			?>
		
	</div>
	
	<?php require_once('assets/includes/rt_sidebar.php'); ?>
	
</div>
	<?php require_once('assets/includes/footer.php'); ?>
    </div> <!-- /container -->
	
    <?php require_once('assets/includes/preloader.php'); ?>
	<?php require_once('assets/includes/like-machine.php'); ?>
	
<?php require_once('assets/includes/bottom.php'); ?>