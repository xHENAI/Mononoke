/**********************************************************************\
|    _____   H33Tx & xHENAI                     __           23.03.2022|
|   /     \   ____   ___Presents:  ____   ____ |  | __ ____      v0.0.9|
|  /  \ /  \ /  _ \ /    \ /  _ \ /    \ /  _ \|  |/ // __ \           |
| /    Y    (  <_> )   |  (  <_> )   |  (  <_> )    <\  ___/           |
| \____|__  /\____/|___|  /\____/|___|  /\____/|__|_ \\___  >          |
|      by \/ $aintly2k  \/ and Fuhrer \/ Kleineick  \/    \/           |
\**********************************************************************/

/============== About ==================\ /========== Team ============\
| Worlds (soon to be) most advanced     | | | Auvrandil - Security     |
| Anime site! Featuring Administration  | | -- HENAI.eu -------------- |
| features and everything you need for  | | | fragile - Security       |
| users, moderators and yourself.       | | -- H33T.moe -------------- |
| The successor of aniZero.             | | | $aintly2k - Programming  |
\=======================================/ | | Kleineick - Programming  |
                                          \============================/
/============== Features ===============\
| Existing and planned ones.            \==============================\
| [x] Three-step Installation-System (easy, fast & simple)             |
| [x] Account System                                                   |
|     [x] Signin & Signup                                              |
|     [x] Confirm Account via eMail                                    |
|     [x] Edit Account & Preferences                                   |
|     [x] Viewing Profile of other User                                |
| [x] Forum System                                                     |
|     [x] Create and Edit Forum                                        |
|     [x] Make Forum private, public, open & closed                    |
|     [x] Create new Threads and Post Replies                          |
| [x] Anime System                                                     |
|     [x] Add and Edit Animes                                          |
|     [x] View Animes on seperate Page                                 |
|     [x] See "New Episode" Button on Anime Page                       |
| [ ] Episode System                                                   |
|     [x] Add New Episode                                              |
|     [x] Multiple Streamhosters                                       |
|         [ ] Local Storage (Upload)                                   |
|         [x] GogoPlay.io                                              |
|         [x] YouTube.com                                              |
|         [x] mp4upload.com                                            |
|         [x] StreamTape.com                                           |
|     [ ] Edit Episode                                                 |
| [ ] Comment System                                                   |
|     [ ] Comment on Anime page                                        |
|     [ ] Comment on Episode page                                      |
|     [ ] Report Comments                                              |
|     [ ] Manage Comments (As Mod, Admin or Comment Author)            |
| [x] Schedule System                                                  |
|     [x] Add new entry to Schedule                                    |
|     [x] Edit Schedule-entries                                        |
|     [x] View Schedule-Page and time (When release?)                  |
|                                                                      |
| More to come...                                                      |
\======================================================================/

/============================ Installation ============================\
|   ONLY DOWNLOAD @ github.com/xHENAI                                  |
| - General Setup ---------------------------------------------------- |
| 1. Download the latest stable Release                                |
| 2. Move all stuff to your webroot and open it in your browser        |
| 3. You should be redirected into the /isntall/ directory             |
| 4. Select your language and fill out all the details                 |
| 5. Configure Sendmail (tutorial below)                               |
| 6. You're done, just fill up the Database now :D                     |
| - Mail Setup ------------------------------------------------------- |
| Sendmail is required - https://gist.github.com/adamstac/7462202      |
| 1. Open your php.ini file (usually in /etc/ directory)               |
| 2. [Linux] Find "sendmail_path" and set it properly (by default it   |
|            it should be /usr/sbin/sendmail -t -i)                    |
| 2. [Windows] Find "SMTP" and edit it to your SMTP server             |
| 3. [Windows] Find "sendmail_from" and set it to your eMail           |
\======================================================================/

/**********************************************************************\
|   _________    Show some love!               __                 ._.  |
|  /   _____/__ ________ ______   ____________/  |_   __ __  _____| |  |
|  \_____  \|  |  \____ \\____ \ /  _ \_  __ \   __\ |  |  \/  ___/ |  |
|  /        \  |  /  |_> >  |_> >  <_> )  | \/|  |   |  |  /\___ \ \|  |
| /_______  /____/|   __/|   __/ \____/|__|   |__|   |____//____  >__  |
|         \/      |__|   |__|                                   \/ \/  |
\**********************************************************************/

/============ H33T.moe ==========\ /============ HENAI.eu =============\
| Twitter: @H33Tx                | | Twitter: @xHENAI                  |
| GitHub: @H33Tx                 | | GitHub: @xHENAI                   |
| PayPal.me: @WOLFRAMEdev        | | eMail: guro@henai.eu              |
| eMail: saintly@dnmx.org        | |                                   |
\================================/ \===================================/

/**********************************************************************\
| ________                            __                               |
| \______ \   _______  ______   _____/  |_  ____   ______ To our       |
|  |    |  \_/ __ \  \/ /    \ /  _ \   __\/ __ \ /  ___/   future     |
|  |    `   \  ___/\   /   |  (  <_> )  | \  ___/ \___ \   selfs.      |
| /_______  /\___  >\_/|___|  /\____/|__|  \___  >____  >              |
|         \/     \/         \/                 \/     \/               |
\**********************************************************************/

/=== User-Levels ===\ /=================== Version ====================\
| 0 = Administrator | |                                                |
| 10 = Moderator    | |               Current: v0.0.9                  |
| 20 = Valid User   | |           Last Updated: 23.03.2022             |
| 30 = Invalid User | |         Notes: Complete rewrite yay!           |
| 50 = Guest        | |                                                |
\===================/ \================================================/

/====== Anime Status ======\ /============== Weekdays =================\
| 0 = Announced            | | 1 = Sunday         | 4 = Wednesday      |
| 1 = Airing               | | 2 = Monday         | 5 = Thursday       |
| 2 = Completed            | | 3 = Tuesday        | 6 = Friday         |
\==========================/ \===================== 7 = Saturday ======/

/=============================== Themes ===============================\
| bootstrap.0.css - Bootstrap Default light theme                      |
| bootstrap.1.css - Bootstrap Cerulean theme (light)                   |
| bootstrap.2.css - Bootstrap Default dark theme                       |
| bootstrap.3.css - Bootstrap Cyborg theme (dark)                      |
| bootstrap.4.css - Bootstrap Darkly theme (dark)                      |
\======================================================================/