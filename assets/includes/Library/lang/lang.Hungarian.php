<?php require_once(dirname(__FILE__).'/../../route.php');

$lang = Array();
$lang['lang'] = 'hu';
$lang['direction'] = 'ltr';
$lang['direction-right'] = 'right';
$lang['direction-left'] = 'left';

//Alerts
$lang['alert-type-success'] = 'Siker';
$lang['alert-type-error'] = 'Hiba';
$lang['alert-restricted'] = 'Hozzáférés megtagadva! Nincs jogosultságod az oldal megtekintéséhez.';
$lang['alert-email_exists'] = 'Ezzel az email címmel már regisztráltak. Válassz másikat!';
$lang['alert-password_reset'] = "A jelszavadat sikeresen visszaállítottuk! Az adatokat elküldtük neked emailben.";
$lang['alert-user_not_found'] = "A felhasználó nem található, kérjük próbálkozz újra.";
$lang['alert-auth_error'] = "Azonosítási hiba, kérjük próbálkozz újra!";
$lang['alert-captcha_error'] = "Biztonsági kód hiba! Kérjük próbálkozz mégegyszer.";
$lang['alert-accept_terms'] = "A felhasználási feltételek el kell fogadnod a regisztráció előtt.";
$lang['alert-account_created'] = "Sikeres regisztráció! Üdv";
$lang['alert-account_failed'] = "Sikertelen regisztráció! Kérjük próbáld újra.";
$lang['alert-invalid_pass'] = "Érvénytelen jelszó, próbáld újra";
$lang['alert-invalid_user'] = "A felhasználó nem létezik";
$lang['alert-upload_error'] = "A fájlt nem sikerült feltölteni, kérjük próbáld újra";
$lang['alert-create_success'] = "Sikeres mentés";
$lang['alert-create_failed'] = "Sikertelen mentés, próbáld újra";
$lang['alert-update_success'] = "Sikeres frissítés";
$lang['alert-update_failed'] = "Sikertelen frissítés, próbáld újra";
$lang['alert-delete_success'] = "Sikeres törlés";
$lang['alert-delete_failed'] = "Sikertelen törlés, próbáld újra";

//Buttons
$lang['btn-register'] = 'Regisztráció';
$lang['btn-add'] = 'Hozzáadás';
$lang['btn-login'] = 'Bejelentkezés';
$lang['btn-submit'] = 'Küldés';
$lang['btn-update'] = 'Frissítés';
$lang['btn-cancel'] = 'Mégse';
$lang['btn-back'] = 'Vissza';
$lang['btn-close'] = 'Bezárás';
$lang['btn-reset_pass'] = 'Jelszó visszaállítása';
$lang['btn-follow'] = 'Követés';
$lang['btn-followed'] = 'Követed';
$lang['btn-like'] = 'Tetszik';
$lang['btn-liked'] = 'Tetszik neked';
$lang['btn-likes'] = 'Kedvelések';
$lang['btn-dislike'] = 'Nem tetszik';
$lang['btn-disliked'] = 'Nem tetszik neked';
$lang['btn-dislikes'] = 'Dislikes';
$lang['btn-answers'] = 'Válasz';
$lang['btn-views'] = 'Megtekintés';
$lang['btn-tools'] = 'Eszközök';
$lang['btn-close_account'] = 'Profil törlése';

//Index page
$lang['index-search-title'] = "Mi jár a fejedben?";
$lang['index-search-button'] = 'Keresés';
$lang['index-search-questions'] = 'Kérdés';
$lang['index-read-button'] = 'Olvasás';
$lang['index-notification-button'] = 'Értesítések';
$lang['index-notification-see_all'] = 'Összes értesítés';
$lang['index-notification-no_results'] = 'Nincs új értesítés';
$lang['index-notification-no_notifications'] = 'Nincs új értesítés';
$lang['index-admin-button'] = 'Admin';
$lang['index-user-admin'] = 'Admin Panel';
$lang['index-user-profile'] = 'Profil';
$lang['index-user-settings'] = 'Beállítások';
$lang['index-user-logout'] = 'Kijelentkezés';
$lang['index-user-login'] = 'Bejelentkezés';
$lang['index-leaderboard-points'] = 'Pontok';
$lang['index-question-submit'] = 'Bejegyzés küldése';
$lang['index-question-intro'] = 'A bejegyzés [VIEWS] megtekintést és [ANSWERS] választ kapott.';
$lang['index-question-no_questions'] = 'Nem található bejegyzés';
$lang['index-question-post'] = 'Írd meg az első bejegyzésed';
$lang['index-question-created'] = 'Elküldve';
$lang['index-question-updated'] = 'Frissítve';
$lang['index-question-read_more'] = 'Még több';
$lang['index-question-answer'] = 'Válasz';
$lang['index-sidebar-welcome'] = 'Üdv';
$lang['index-sidebar-feeds'] = 'Témák';
$lang['index-sidebar-top'] = 'Legújabbak';
$lang['index-sidebar-trending'] = 'Népszerű';
$lang['index-sidebar-subscriptions'] = 'Feliratkozások';
$lang['index-sidebar-related_questions'] = 'Kapcsolódó bejegyzések';
$lang['index-sidebar-your_questions'] = 'Bejegyzéseid';
$lang['index-sidebar-your_answers'] = 'Hozzászólásaid';

//Admin page
$lang['admin-title'] = 'Admin oldal';
$lang['admin-hello'] = 'Hello';
$lang['admin-section-dashboard'] = 'Főoldal';
$lang['admin-section-general'] = 'Általános beállítások';
$lang['admin-section-filter'] = 'CSúnya szavak tiltása';
$lang['admin-section-pending'] = 'Jóváhagyásra vár';
$lang['admin-section-users'] = 'Felhasználók';
$lang['admin-section-groups'] = 'Csoportok';
$lang['admin-section-pages'] = 'Oldalak szerkesztése';
$lang['admin-dashboard-users'] = "<b>[COUNT]</b> regisztrált felhasználója van az oldalnak, melyeket <a href='#users' data-toggle='tab'>itt tudsz megtekinteni</a><br>Az elmúlt három hétben regisztráltak száma";
$lang['admin-dashboard-questions'] = "<b>[COUNT]</b> bejegyzést küldtek az oldalra<br>Az elmúlt 3 hét eredményei:";
$lang['admin-dashboard-answers'] = "<b>[COUNT]</b> hozzászólást küldtek az oldalra<br>Az elmúlt 3 hét eredményei:";
$lang['admin-pages-title'] = "Oldalak szerkesztése";
$lang['admin-pages-about-email'] = "Kapcsolat email címe";
$lang['admin-filter-title'] = "Csúnya szavak tiltásának beállítása";
$lang['admin-general-title'] = "Általános beállítások";
$lang['admin-general-site-title'] = "- Oldal beállítása -";
$lang['admin-general-site-lang'] = "Oldal nyelve";
$lang['admin-general-site-name'] = "Oldal neve";
$lang['admin-general-site-description'] = "Oldal leírása";
$lang['admin-general-site-keywords'] = "Kulcsszavak";
$lang['admin-general-site-status'] = "Státusz";
$lang['admin-general-site-status_msg'] = "Üzemen kívüli üzeet";
$lang['admin-general-url-title'] = "- URL beállítások -";
$lang['admin-general-url-type'] = "URL típusa";
$lang['admin-general-posting-title'] = "- Beküldés beállítása -";
$lang['admin-general-posting-questions'] = "Bejegyzés publikálása";
$lang['admin-general-posting-answers'] = "Hozzászólás publikálása";
$lang['admin-general-access-title'] = "- Oldal hozzáférése -";
$lang['admin-general-access-login'] = "Megtekinthető bejelentkezés nélkül";
$lang['admin-general-reg-title'] = "- Regisztrációs beállítások -";
$lang['admin-general-reg-group'] = "Alapértelmezett csoport";
$lang['admin-pending-title'] = "Beküldés admin jóváhagyásra";
$lang['admin-pending-questions'] = "- Bejegyzés -";
$lang['admin-pending-questions-title'] = "Cím";
$lang['admin-pending-questions-user'] = "Küldve";
$lang['admin-pending-answers'] = "- Hozzászólások -";
$lang['admin-pending-answers-comment'] = "Hozzászólás";
$lang['admin-pending-answers-user'] = "Elküldve";
$lang['admin-users-title'] = "Regisztrált felhasználók";
$lang['admin-users-f_name'] = "Keresztnév";
$lang['admin-users-l_name'] = "Vezetéknév";
$lang['admin-users-phone'] = "Telefon";
$lang['admin-users-address'] = "Cím";
$lang['admin-users-group'] = "Moderátor";
$lang['admin-users-comment'] = "Rövid leírás";
$lang['admin-users-about'] = "Rólam";
$lang['admin-users-avatar'] = "Avatar";
$lang['admin-users-email'] = "Email";
$lang['admin-users-pass'] = "Jelszó";
$lang['admin-users-suspend'] = "Profil felfüggesztése";
$lang['admin-users-questions'] = "Bejegyzések";
$lang['admin-users-answers'] = "Hozzászólások";
$lang['admin-groups-title'] = "Moderátorok";
$lang['admin-groups-name'] = "Csoportok";
$lang['admin-groups-users'] = "Felhasználók";

//Login page
$lang['login-logged_out'] = 'Sikeres kijelentkezés!';
$lang['login-using_facebook'] = 'Bejelentkezés Facebook fiókkal';
$lang['login-using_google'] = 'Bejelentkezés Google fiókkal';
$lang['login-register'] = 'Vagy, regisztrálj <a href="#me" id="register">az oldalon</a>';
$lang['login-remember'] = 'Emlékezz rám';
$lang['login-forgot_pass'] = 'Elfelejtett jelszó?';
$lang['login-as_guest'] = "vagy <a href='{$url_mapper['index/']}' class=''>bejelentkezés vendégként</a>";
$lang['login-privacy'] = 'A regisztrációval előtt elolvastam és elfogadom az <a href="#privacy_policy" data-toggle="modal">adatvédelmi irányelveket</a>.';
$lang['login-register-f_name'] = 'Keresztnév';
$lang['login-register-l_name'] = 'Vezetéknév';
$lang['login-register-email'] = 'Email';
$lang['login-register-pass'] = 'Jelszó';
$lang['login-register-terms'] = 'A regisztrációval elfogadom a <a href="#terms" data-toggle="modal">felhasználási feltételeket</a>';

//Questions
$lang['questions-pending'] = " Az adminok jóváhagyása szükséges a bejegyzés publikálásához";
$lang['questions-pending-tag'] = " Várakozás az adminok jóváhagyására";
$lang['questions-title'] = "Bejegyzés elküldése";
$lang['questions-q_title'] = "Bejegyzés címe";
$lang['questions-anonymous'] = "Küldés névtelenül";
$lang['questions-tags'] = "Témakör &nbsp;&nbsp;<span style='color:#b0b0b0'>írd be a témakört és üss entert</span>";
$lang['questions-details'] = "A bejegyzés részletei";
$lang['questions-answer-create_success'] = "A hozzászólásodat sikeresen elkülted! Köszönjük hogy építed a Teori közösségének tudását!";
$lang['questions-answer-create_failed'] = "A hozzászólás elküldése sikertelen, kérjük próbálkozz újra.";
$lang['questions-answer-update_success'] = "A hozzászólásodat frissítetted!";
$lang['questions-answer-update_failed'] = "A hozzászólás elküldése sikertelen, kérjük próbálkozz újra.";
$lang['questions-approve'] = "Bejegyzés elfogadása";
$lang['questions-edit'] = "Bejegyzés szerkesztése";
$lang['questions-delete'] = "Bejegyzés törlése";
$lang['questions-report'] = "Bejegyzés jelentése";
$lang['questions-answer-report'] = "Hozzászólás jelentése";
$lang['questions-answer-create'] = "Hozzászólás elküldése";
$lang['questions-answer-update'] = "Hozzászólás szerkesztése";

//Site Pages
$lang['pages-about-title'] = 'Rólunk';
$lang['pages-contact-title'] = 'Kapcsolat';
$lang['pages-contact-success'] = "Üzeneted sikeresen elküldted, köszönjük a visszajelzésed";
$lang['pages-contact-fail'] = "Sikertelen üzenetküldés, kérjük próbáld meg mégegyszer";
$lang['pages-contact-name'] = "Név";
$lang['pages-contact-email'] = "Email";
$lang['pages-contact-msg_title'] = "Üzenet címe";
$lang['pages-contact-msg_details'] = "Üzenet";
$lang['pages-contact-captcha'] = "Biztonsági kérdés";
$lang['pages-contact-send'] = "Üzenet küldése";
$lang['pages-privacy-title'] = 'Adatvédelmi irányelvek';
$lang['pages-terms-title'] = 'Felhasználási feltételek';
$lang['pages-leaderboard-title'] = 'Ranglista';

//users
$lang['user-anonymous'] = 'Névtelen';
$lang['user-anonymous-intro'] = 'Küldés névtelenül, így csak te fogod látni.';
$lang['user-account-options'] = 'Profil beállítások';
$lang['user-account-edit'] = 'Profil szerkesztése';
$lang['user-account-delete'] = 'Profil törlése';
$lang['user-farewell'] = 'Viszlát [NAME]! Ha meggondolnád magad vedd fel a kapcsolatot [EMAIL] email címen velünk.';
$lang['user-sections'] = 'Adatok';
$lang['user-questions'] = 'Bejegyzések';
$lang['user-answers'] = 'Hozzászólás';
$lang['user-followed'] = 'Követve';
$lang['user-following'] = 'Követés';
$lang['user-points'] = 'Pont';
$lang['user-comment-read_more'] = 'Teljes hozzászólás elküldése';
$lang['user-comment-posted_at'] = 'Elküldve';
$lang['user-delete-msg'] = "Biztos hogy törölni akarod a profilodat?";
$lang['user-points-reason'] = "Oka";
$lang['user-points-awarded_at'] = "Jutalmazva";

//Notifications
$lang['notif-q_publish'] = "A bejegyzésed ([TITLE]) sikeresen közzétetted";
$lang['notif-q_reject'] = "A bejegyzésedet ([TITLE]) az adminok törölték";
$lang['notif-a_publish'] = "A hozzászólásodat ([TITLE]) sikeresen közzétetted";
$lang['notif-a_reject'] = "A hozzászólásodat ([TITLE]) az adminok törölték";
$lang['notif-a_publish-follow'] = "([NAME]) hozzászólt ehhez a bejegyzésedhez: ([TITLE])";
$lang['notif-user-follow'] = "<a href='[LINK]/'>[NAME]</a> követ téged";
$lang['notif-award'] = "Kaptál";
$lang['notif-point'] = "pontot";
$lang['notif-q_f_award'] = "<a href='[LINK]/'>[NAME]</a> követi az egyik <a href='[Q_LINK]'>bejegyzésed</a>";
$lang['notif-q_l_award'] = "<a href='[LINK]/'>[NAME]</a> kedveli az egyik <a href='[Q_LINK]'>bejegyzésed</a>";
$lang['notif-a_l_award'] = "<a href='[LINK]/'>[NAME]</a> kedveli az egyik <a href='[Q_LINK]'>hozzászólásodat</a>";

//Updates
$lang['questions-report-info'] = 'Indok amiért jelented ezt a tartalmat';
$lang['questions-report-reported'] = "Ezt a bejegyzést már jelentetted";
$lang['admin-section-reports'] = "Jelentések";
$lang['admin-reports-title'] = "Függő jelentések";
$lang['admin-reports-post'] = "Tartalom";
$lang['admin-reports-user'] = "Felhasználó";
$lang['admin-reports-info'] = "Ok";
$lang['admin-reports-type-q'] = "Bejegyzés";
$lang['admin-reports-type-a'] = "Hozzászólás";
$lang['admin-reports-approve_report'] = "Tartalom törlése";
$lang['admin-reports-approve_report-alert'] = "Biztos hogy törölni szeretnéd a tartalmat az adatbázisból?";
$lang['admin-reports-reject_report'] = "Jelentés elutasítása";
$lang['admin-reports-reject_report-alert'] = "Biztos hogy elutasítod ezt a jelentést?";
$lang['notif-report-q_publisher-approve'] = "A bejegyzésed ([TITLE]) el lett távolítva az oldalról. Kérjük olvasd el a <a href='{$url_mapper['pages/view']}terms'>felhasználási feltételeket</a> mielőtt elküldöd a bejegyzésed.";
$lang['notif-report-q_reporter-approve'] = "A bejegyzés ([TITLE]) el lett távolítva amit jelentettél nekünk, köszönjük!";
$lang['notif-report-a_publisher-approve'] = "A hozzászólásod ([TITLE]) törölve lett a felhasználói visszajelzések miatt, kérjük a jövőben olvasd el a <a href='{$url_mapper['pages/view']}terms'>felhasználási feltételeket</a> mielőtt hozzászólnál.";
$lang['notif-report-a_reporter-approve'] = "A hozzászólás ([TITLE]) el lett távolítva amit jelentettél nekünk, köszönjük!";
$lang['notif-report-q_reporter-reject'] = "A jelentésedet átnéztük ([TITLE]), de megfelel a <a href='{$url_mapper['pages/view']}terms'>felhasználási feltételek</a>nek, így a bejegyzés nem került törlésre.";
$lang['notif-report-a_reporter-reject'] = "A jelentésedet átnéztük ([TITLE]), de megfelel a <a href='{$url_mapper['pages/view']}terms'>felhasználási feltételek</a>nek, így a bejegyzés nem került törlésre.";

$lang['btn-go_to_q'] = "Full Conversation";
$lang['admin-section-topics'] = "Edit Topics";
$lang['admin-topics-title'] = "Edit Site Topics";
$lang['admin-topics-name'] = "Topic Name";
$lang['admin-topics-description'] = "Topic Description";
$lang['admin-topics-avatar'] = "Avatar";

$lang['admin-section-admanager'] = "Ads Manager";
$lang['admin-admanager-title'] = "Ads Manager";
$lang['admin-admanager-lt_sidebar'] = "Left Sidebar";
$lang['admin-admanager-rt_sidebar'] = "Right Sidebar";
$lang['admin-admanager-between_q'] = "Between Questions";
$lang['admin-admanager-between_a'] = "Between Answers";

$lang['notif-a_mention'] = "([NAME]) Has mentioned you in ([TITLE]) question, Click here and join the discussion!";
$lang['admin-users-username'] = "Username";
$lang['alert-username_exists'] = 'Username already exists in database! please try again';


$lang['welcome'] = 'Welcome';
$lang['welcome-msg'] = "Please choose your favorite topics you want to follow";

$lang['index-chat-title'] = "Chat";
$lang['index-chat-no_chat'] = "Click on one of online users to start chatting";
$lang['index-chat-no_friends'] = "No friends available for chat! Follow your followers back to start chatting with them";
$lang['index-chat-send'] = "Send";
$lang['admin-general-chat-title'] = "- Chat Settings -";
$lang['admin-general-chat-msg'] = "Enable chatting (for users that follow each other)";

