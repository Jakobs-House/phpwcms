<?php
/*************************************************************************************
   Copyright notice
   
   (c) 2002-2006 Oliver Georgi (oliver@phpwcms.de) // All rights reserved.
 
   This script is part of PHPWCMS. The PHPWCMS web content management system is
   free software; you can redistribute it and/or modify it under the terms of
   the GNU General Public License as published by the Free Software Foundation;
   either version 2 of the License, or (at your option) any later version.
  
   The GNU General Public License can be found at http://www.gnu.org/copyleft/gpl.html
   A copy is found in the textfile GPL.txt and important notices to the license 
   from the author is found in LICENSE.txt distributed with these scripts.
  
   This script is distributed in the hope that it will be useful, but WITHOUT ANY 
   WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
   PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 
   This copyright notice MUST APPEAR in all copies of the script!
*************************************************************************************/


// Language: Polish, Language Code: pl
// please use HTML safe strings ONLY,neccessary to reduce processing time
// normal line break:    '&#13;', JavaScript Linebreak: '\n'


$BL['usr_online']                       = 'zalogowani u�ytkownicy';

// Login Page
$BL["login_text"]                       = 'Podaj swoje dane aby si� zalogowa�';
$BL['login_error']                      = 'B��d podczas logowania!';
$BL["login_username"]                   = 'u�ytkownik';
$BL["login_userpass"]                   = 'has�o';
$BL["login_button"]                     = 'zaloguj';
$BL["login_lang"]                       = 'wybierz j�zyk';

// phpwcms.php
$BL['be_nav_logout']                    = 'WYLOGUJ SI�';
$BL['be_nav_articles']                  = 'ARTYKU�Y';
$BL['be_nav_files']                     = 'PLIKI';
$BL['be_nav_modules']                   = 'MODU�Y';
$BL['be_nav_messages']                  = 'WIADOMO�CI';
$BL['be_nav_chat']                      = 'CHAT';
$BL['be_nav_profile']                   = 'PROFILE';
$BL['be_nav_admin']                     = 'ADMINISTRACJA';
$BL['be_nav_discuss']                   = 'DYSKUSJA';

$BL['be_page_title']                    = 'system zarz�dzania phpwcms';

$BL['be_subnav_article_center']         = 'centrum artyku��w';
$BL['be_subnav_article_new']            = 'nowy artyku�';
$BL['be_subnav_file_center']            = 'centrum plik�w';
$BL['be_subnav_file_ftptakeover']       = 'wgrane przez ftp';
$BL['be_subnav_mod_artists']            = 'artysta, kategoria, rodzaj';
$BL['be_subnav_msg_center']             = 'centrum wiadomo�ci';
$BL['be_subnav_msg_new']                = 'nowa wiadomo��';
$BL['be_subnav_msg_newsletter']         = 'subskrypcja nowo�ci';
$BL['be_subnav_chat_main']              = 'g��wna strona chatu';
$BL['be_subnav_chat_internal']          = 'wewn�trzny chat';
$BL['be_subnav_profile_login']          = 'informacje logowania';
$BL['be_subnav_profile_personal']       = 'informacje osobiste';
$BL['be_subnav_admin_pagelayout']       = 'layout strony';
$BL['be_subnav_admin_templates']        = 'szablony';
$BL['be_subnav_admin_css']              = 'domy�lny styl css';
$BL['be_subnav_admin_sitestructure']    = 'struktura witryny';
$BL['be_subnav_admin_users']            = 'administracja u�ytkownikami';
$BL['be_subnav_admin_filecat']          = 'kategorie plik�w';


// admin.functions.inc.php
$BL['be_func_struct_articleID']         = 'ID artyku�u';
$BL['be_func_struct_preview']           = 'podgl�d';
$BL['be_func_struct_edit']              = 'edytuj artyku�';
$BL['be_func_struct_sedit']             = 'edytuj poziom struktury';
$BL['be_func_struct_cut']               = 'wytnij artyku�';
$BL['be_func_struct_nocut']             = 'zaniechaj wyci�cia artyku�u';
$BL['be_func_struct_svisible']          = 'prze��cz widoczny/niewidoczny';
$BL['be_func_struct_spublic']           = 'prze��cz publiczny/niepubliczny';
$BL['be_func_struct_sort_up']           = 'sortuj w g�r�';
$BL['be_func_struct_sort_down']         = 'sortuj w d�';
$BL['be_func_struct_del_article']       = 'usu� artyku�';
$BL['be_func_struct_del_jsmsg']         = 'Czy na pewno chcesz \nusun�� artyku�?'; // "\n" = JavaScript Linebreak
$BL['be_func_struct_new_article']       = 'utw�rz nowy artyku� na tym poziomie struktury';
$BL['be_func_struct_paste_article']     = 'wklej artyku� na ten poziom struktury';
$BL['be_func_struct_insert_level']      = 'wstaw na ten poziom w struktur�';
$BL['be_func_struct_paste_level']       = 'wklej na ten poziom struktury';
$BL['be_func_struct_cut_level']         = 'wytnij ten poziom struktury';
$BL['be_func_struct_no_cut']            = "Nie mo�na wyci�� g��wnego poziomu struktury!";
$BL['be_func_struct_no_paste1']         = "Nie mo�na tutaj wklei�!";
$BL['be_func_struct_no_paste2']         = 'czy potomek jest r�wnorz�dny do g��wnego poziomu drzewa';
$BL['be_func_struct_no_paste3']         = 'to powinno zosta� wklejone tutaj';
$BL['be_func_struct_paste_cancel']      = 'anuluj zmian� poziomu struktury';
$BL['be_func_struct_del_struct']        = 'usu� poziom struktury';
$BL['be_func_struct_del_sjsmsg']        = 'Czy naprawd� chcesz \nusun�� poziom struktury?'; // "\n" = JavaScript Linebreak
$BL['be_func_struct_open']              = 'otw�rz';
$BL['be_func_struct_close']             = 'zamknij';
$BL['be_func_struct_empty']             = 'opr�nij';

// article.contenttype.inc.php
$BL['be_ctype_plaintext']               = 'czysty tekst';
$BL['be_ctype_html']                    = 'html';
$BL['be_ctype_code']                    = 'kod programistyczny';
$BL['be_ctype_textimage']               = 'tekst z grafik�';
$BL['be_ctype_images']                  = 'grafika';
$BL['be_ctype_bulletlist']              = 'lista (jako tabela)';
$BL['be_ctype_ullist']     		= 'lista';
$BL['be_ctype_link']                    = 'odno�nik &amp; email';
$BL['be_ctype_linklist']                = 'lista odno�nik�w';
$BL['be_ctype_linkarticle']             = 'odno�niki do artyku��w';
$BL['be_ctype_multimedia']              = 'multimedia';
$BL['be_ctype_filelist']                = 'lista plik�w';
$BL['be_ctype_emailform']               = 'generator formularza email';
$BL['be_ctype_newsletter']              = 'list z nowo�ci�';

// profile.create.inc.php
$BL['be_profile_create_success']        = 'Profil zosta� pomy�lne stworzony.';
$BL['be_profile_create_error']          = 'B��d podczas tworzenia.';

// profile.update.inc.php
$BL['be_profile_update_success']        = 'Dane profilu zosta�y pomy�lnie zaktualizowane.';
$BL['be_profile_update_error']          = 'B��d podczas aktualizacji.';

// profile.updateaccount.inc.php
$BL['be_profile_account_err1']          = 'u�ytkownik {VAL} jest nieprawid�owy';
$BL['be_profile_account_err2']          = 'has�o jest za kr�tkie (tylko {VAL} zank�w: musi mie� co najmniej 5 znak�w)';
$BL['be_profile_account_err3']          = 'powt�rzenie has�a musi si� zgadza� z has�em';
$BL['be_profile_account_err4']          = 'adres email {VAL} jest nieprawid�owy';

// profile.data.tmpl.php
$BL['be_profile_data_title']            = 'twoje dane osobiste';
$BL['be_profile_data_text']             = 'dane osobiste s� opcjonalne. Mog� one pom�c innym u�ytkownikom lub go�ciom witryny, dowiedzie� si� wi�cej o Tobie.';
$BL['be_profile_label_title']           = 'tytu�';
$BL['be_profile_label_firstname']       = 'imie';
$BL['be_profile_label_name']            = 'nazwisko';
$BL['be_profile_label_company']         = 'firma';
$BL['be_profile_label_street']          = 'ulica';
$BL['be_profile_label_city']            = 'miejscowo��';
$BL['be_profile_label_state']           = 'wojew�dztwo';
$BL['be_profile_label_zip']             = 'kod pocztowy';
$BL['be_profile_label_country']         = 'kraj';
$BL['be_profile_label_phone']           = 'telefon';
$BL['be_profile_label_fax']             = 'faks';
$BL['be_profile_label_cellphone']       = 'telefon przeno�ny';
$BL['be_profile_label_signature']       = 'podpis';
$BL['be_profile_label_notes']           = 'notatka';
$BL['be_profile_label_profession']      = 'zaw�d';
$BL['be_profile_label_newsletter']      = 'listy nowo�ci';
$BL['be_profile_text_newsletter']       = 'Zgadzam si� na otrzymywanie og�lnych list�w nowo�ci z systemu phpwcms.';
$BL['be_profile_label_public']          = 'publiczne';
$BL['be_profile_text_public']           = 'Ka�dy mo�e widzie� moje dane osobiste.';
$BL['be_profile_label_button']          = 'uaktualnij dane osobiste';

// profile.account.tmpl.php
$BL['be_profile_account_title']         = 'twoje dane do logowania';
$BL['be_profile_account_text']          = 'Normalnie nie ma potrzeby zmienia� swojej nazwy u�ytkownika.<br />Za to powiniene� od czasu do czasu zmieni� swoje has�o.';
$BL['be_profile_label_err']             = 'prosz� sprawd�';
$BL['be_profile_label_username']        = 'nazwa u�ytkownika';
$BL['be_profile_label_newpass']         = 'nowe has�o';
$BL['be_profile_label_repeatpass']      = 'powt�rz nowe has�o';
$BL['be_profile_label_email']           = 'email';
$BL['be_profile_account_button']        = 'uaktulnij';
$BL['be_profile_label_lang']            = 'j�zyk';


// files.ftptakeover.tmpl.php
$BL['be_ftptakeover_title']             = 'pliki wgrane przez ftp';
$BL['be_ftptakeover_mark']              = 'zaznacz';
$BL['be_ftptakeover_available']         = 'dost�pne pliki';
$BL['be_ftptakeover_size']              = 'rozmiar';
$BL['be_ftptakeover_nofile']            = 'w tej chwili nie ma dost�pnych plik�w &#8211; musisz wgra� jaki� przez ftp';
$BL['be_ftptakeover_all']               = 'WSZYSTKIE';
$BL['be_ftptakeover_directory']         = 'katalog';
$BL['be_ftptakeover_rootdir']           = 'g��wny katalog';
$BL['be_ftptakeover_needed']            = 'wymagane!!! (musisz wybra� przynajmniej jeden)';
$BL['be_ftptakeover_optional']          = 'opcjonalne';
$BL['be_ftptakeover_keywords']          = 's�owa kluczowe';
$BL['be_ftptakeover_additional']        = 'dodatkowe';
$BL['be_ftptakeover_longinfo']          = 'd�ugie info';
$BL['be_ftptakeover_status']            = 'status';
$BL['be_ftptakeover_active']            = 'aktywne';
$BL['be_ftptakeover_public']            = 'publiczne';
$BL['be_ftptakeover_createthumb']       = 'utw�rz miniaturk�';
$BL['be_ftptakeover_button']            = 'odbierz wybrane pliki';

// files.reiter.tmpl.php
$BL['be_ftab_title']                    = 'centrum plik�w';
$BL['be_ftab_createnew']                = 'utw�rz nowy katalog w g��wnym';
$BL['be_ftab_paste']                    = 'wklej pliki ze schowka do g��wnego katalogu';
$BL['be_ftab_disablethumb']             = 'wy��cz miniaturki w li�cie plik�w';
$BL['be_ftab_enablethumb']              = 'w��cz miniaturki w li�cie plik�w';
$BL['be_ftab_private']                  = 'prywatne&nbsp;pliki';
$BL['be_ftab_public']                   = 'publiczne&nbsp;pliki';
$BL['be_ftab_search']                   = 'szukaj';
$BL['be_ftab_trash']                    = 'kosz';
$BL['be_ftab_open']                     = 'otw�rz wszystkie katalogi';
$BL['be_ftab_close']                    = 'zamknij wszystkie katalogi';
$BL['be_ftab_upload']                   = 'wgraj pliki do g��wnego katalogu';
$BL['be_ftab_filehelp']                 = 'otw�rz plik pomocy';

// files.private.newdir.tmpl.php
$BL['be_fpriv_rootdir']                 = 'g��wny katalog';
$BL['be_fpriv_title']                   = 'utw�rz nowy katalog';
$BL['be_fpriv_inside']                  = 'wewn�trz';
$BL['be_fpriv_error']                   = 'b��d: wype�nij pole nazwa dla katalogu';
$BL['be_fpriv_name']                    = 'nazwa';
$BL['be_fpriv_status']                  = 'status';
$BL['be_fpriv_button']                  = 'utw�rz nowy katalog';

// files.private.editdir.tmpl.php
$BL['be_fpriv_edittitle']               = 'edycja katalogu';
$BL['be_fpriv_newname']                 = 'nowa nazwa';
$BL['be_fpriv_updatebutton']            = 'uaktualnij dane katalogu';

// files.private.upload.tmpl.php
$BL['be_fprivup_err1']                  = 'Wybierz pliki kt�re chcesz wgra�';
$BL['be_fprivup_err2']                  = 'Rozmiar plik�w do wgrania jest wi�kszy ni�';
$BL['be_fprivup_err3']                  = 'B��d w trakcie wgrywania plik�w';
$BL['be_fprivup_err4']                  = 'B��d podczas tworzenia ktalogu u�ytkownika.';
$BL['be_fprivup_err5']                  = 'miniaturki nie istniej�';
$BL['be_fprivup_err6']                  = 'Prosz� nie pr�bowa� ponownie - To jest b��d serwera! Skontakuj si� ze swoim <a href="mailto:{VAL}">administratorem</a> tak szybko jak to mo�liwe!';
$BL['be_fprivup_title']                 = 'wgrywanie pliki';
$BL['be_fprivup_button']                = 'wgraj pliki';
$BL['be_fprivup_upload']                = 'wgraj';

// files.private.editfile.tmpl.php
$BL['be_fprivedit_title']               = 'edycja informacji o pliku';
$BL['be_fprivedit_filename']            = 'nazwa pliku';
$BL['be_fprivedit_created']             = 'utworzony';
$BL['be_fprivedit_dateformat']          = 'Y-m-d H:i';
$BL['be_fprivedit_err1']                = 'skoryguj nazw� pliku (ustaw z powrotem oryginaln�)';
$BL['be_fprivedit_clockwise']           = 'obr�� miniatur� zgodnie z ruchem zegara [oryginalny plik +90&deg;]';
$BL['be_fprivedit_cclockwise']          = 'obr�� miniatur� nie zgodnie z ruchem zegara [oryginalny plik -90&deg;]';
$BL['be_fprivedit_button']              = 'uaktualnij informacj� o pliku';
$BL['be_fprivedit_size']                = 'rozmiar';

// files.private-functions.inc.php
$BL['be_fprivfunc_upload']              = 'wgraj pliki do katalogu';
$BL['be_fprivfunc_makenew']             = 'utw�rz nowy katalog wewn�trz';
$BL['be_fprivfunc_paste']               = 'wklej plik ze schowka do katalogu';
$BL['be_fprivfunc_edit']                = 'edytuj katalog';
$BL['be_fprivfunc_cactive']             = 'prze��cz aktywny/nieaktywny';
$BL['be_fprivfunc_cpublic']             = 'prze��cz publiczny/niepubliczny';
$BL['be_fprivfunc_deldir']              = 'usu� katalog';
$BL['be_fprivfunc_jsdeldir']            = 'Czy na pewno chcesz \nusun�� katalog';
$BL['be_fprivfunc_notempty']            = 'katalog {VAL} nie jest pusty!';
$BL['be_fprivfunc_opendir']             = 'otw�rz katalog';
$BL['be_fprivfunc_closedir']            = 'zamknij katalog';
$BL['be_fprivfunc_dlfile']              = '�ci�gnij plik';
$BL['be_fprivfunc_clipfile']            = 'plik w schowku';
$BL['be_fprivfunc_cutfile']             = 'wytnij';
$BL['be_fprivfunc_editfile']            = 'edytuj informacj� o pliku';
$BL['be_fprivfunc_cactivefile']         = 'prze��cz aktywny/nieaktywny';
$BL['be_fprivfunc_cpublicfile']         = 'prze��cz publiczny/niepubliczny';
$BL['be_fprivfunc_movetrash']           = 'przesu� do kosza';
$BL['be_fprivfunc_jsmovetrash1']        = 'Czy napewno chcesz ten plik';
$BL['be_fprivfunc_jsmovetrash2']        = 'przesun�� do kosza?';

// files.private.additions.inc.php
$BL['be_fprivadd_nofolders']            = 'brak prywatnych plik�w lub folder�w';

// files.public.list.tmpl.php
$BL['be_fpublic_user']                  = 'u�ytkownik';
$BL['be_fpublic_nofiles']               = 'brak publicznych plik�w lub katalog�w';

// files.private.trash.tmpl.php
$BL['be_ftrash_nofiles']                = 'kosz jest pusty';
$BL['be_ftrash_show']                   = 'poka� prywtane pliki';

// files.private-delfilelist.inc.php
$BL['be_ftrash_restore']                = 'Czy chesz przywr�ci� {VAL} \ni przenie�� do prywatnej listy?';
$BL['be_ftrash_delete']                 = 'Czy chesz usun�� {VAL}?';
$BL['be_ftrash_undo']                   = 'przywr�� (odwr�� usuwanie)';
$BL['be_ftrash_delfinal']               = 'ostateczne usuni�cie';

// files.search.tmpl.php
$BL['be_fsearch_err1']                  = 'brak ci�gu zank�w do wyszukiwania.';
$BL['be_fsearch_title']                 = 'szukaj plik�w';
$BL['be_fsearch_infotext']              = 'To jest prosta wyszukiwarka informacji o plikach. Przeszukuje ona s�owa kluczowe,<br />nazwy i d�ugie info o plikach.Nie wspiera znak�w specjalnych. <br />Wybierz I/LUB oraz typy plik�w: prywatne/publiczne.';
$BL['be_fsearch_nonfound']              = 'nie znaleziono plik�w dla twojego zapytania. zmie� swoje zapytanie!';
$BL['be_fsearch_fillin']                = 'prosz� wype�nij pole wyszukiwarki ci�giem znak�w do wyszukania.';
$BL['be_fsearch_searchlabel']           = 'szukaj ';
$BL['be_fsearch_startsearch']           = 'rozpocznij wyszukiwanie';
$BL['be_fsearch_and']                   = 'I';
$BL['be_fsearch_or']                    = 'LUB';
$BL['be_fsearch_all']                   = 'wszystkie pliki';
$BL['be_fsearch_personal']              = 'prywatne';
$BL['be_fsearch_public']                = 'publiczne';

// chat.main.tmpl.php & chat.list.tmpl.php
$BL['be_chat_title']                    = 'wewn�trzny chat';
$BL['be_chat_info']                     = 'Tutaj mo�esz porozumie� si� z innymi u�ytkownikami swojego systemu phpWCMS. To medium jest przeznaczone g��wnie do porozumiewania si� w czasie rzeczywistemy, ale mo�esz r�wnie� zostawia� poprzez niego wiadomo�ci dla innych.';
$BL['be_chat_start']                    = 'kliknij tutaj aby uruchomi� chat';
$BL['be_chat_lines']                    = 'linie chata';

// message.center.tmpl.php
$BL['be_msg_title']                     = 'centrum wiadomo�ci';
$BL['be_msg_new']                       = 'nowa';
$BL['be_msg_old']                       = 'stara';
$BL['be_msg_senttop']                   = 'wys�ana';
$BL['be_msg_del']                       = 'usuni�ta';
$BL['be_msg_from']                      = 'od';
$BL['be_msg_subject']                   = 'temat';
$BL['be_msg_date']                      = 'data/czas';
$BL['be_msg_close']                     = 'zamknij wiadomo��';
$BL['be_msg_create']                    = 'utw�rz now� wiadomo��';
$BL['be_msg_reply']                     = 'odpowiedz na wiadomo��';
$BL['be_msg_move']                      = 'przesu� t� wiadomo�� do kosza';
$BL['be_msg_unread']                    = 'nieprzeczytana lub nowa wiadomo��';
$BL['be_msg_lastread']                  = 'ostatnie {VAL} przeczytanych wiadomo�ci';
$BL['be_msg_lastsent']                  = 'ostatnie {VAL} wys�anych wiadomo�ci';
$BL['be_msg_marked']                    = 'wiadomo�ci oznaczone do usuni�cia (kosz)';
$BL['be_msg_nomsg']                     = 'brak wiadomo�ci w katalogu';

// message.send.tmpl.php
$BL['be_msg_RE']                        = 'ODP';
$BL['be_msg_by']                        = 'wys�ana przez';
$BL['be_msg_on']                        = 'w dniu';
$BL['be_msg_msg']                       = 'wiadomo��';
$BL['be_msg_err1']                      = 'zapomnia�e� udtsawi� odbiorc�...';
$BL['be_msg_err2']                      = 'wype�nij pole tytu�u (odbiorcy b�dzie �atwiej czyta� Twoj� wiadomo��)';
$BL['be_msg_err3']                      = 'nie ma sensu wysy�a� wiadomo�ci bez tre�ci ;-)';
$BL['be_msg_sent']                      = 'nowa wiadomo�� zosta�a wys�ana!';
$BL['be_msg_fwd']                       = 'zostaniesz przekierowany do centrum wiadomo�ci lub';
$BL['be_msg_newmsgtitle']               = 'napisz now� wiadomo��';
$BL['be_msg_err']                       = 'b��d podczas wysy�ania wiadomo�ci';
$BL['be_msg_sendto']                    = 'wy�lij wiadomo�� do';
$BL['be_msg_available']                 = 'lista dost�nych odbiorc�w';
$BL['be_msg_all']                       = 'wy�lij widomo�� do wszystkich wybranych odbiorc�w';

// message.subscription.tmpl.php
$BL['be_newsletter_title']              = 'subskrypcja wiadomo�ci o nowo�ciach';
$BL['be_newsletter_titleedit']          = 'edytuj subskrypcj�';
$BL['be_newsletter_new']                = 'utw�rz nowy/�';
$BL['be_newsletter_add']                = 'dodaj&nbsp;wiadomo��&nbsp;do&nbsp;subskrypcji';
$BL['be_newsletter_name']               = 'nazwa';
$BL['be_newsletter_info']               = 'info';
$BL['be_newsletter_button_save']        = 'Zapisz subskrypcj�';
$BL['be_newsletter_button_cancel']      = 'Anuluj';

// admin.newuser.tmpl.php
$BL['be_admin_usr_err1']                = 'nazwa u�ytkownika jest b��dna, wybierz inn�';
$BL['be_admin_usr_err2']                = 'nazwa u�ytkownika nie mo�e by� pusta';
$BL['be_admin_usr_err3']                = 'has�o u�ytkownika nie mo�e by� puste';
$BL['be_admin_usr_err4']                = "adres email jest nieprawid�owy";
$BL['be_admin_usr_err']                 = 'b��d';
$BL['be_admin_usr_mailsubject']         = 'Witajcie w systemie zarz�dzania phpWCMS';
$BL['be_admin_usr_mailbody']            = "WITAJCIE W SYSTEMIE ZARZ�DZANIA PHPWCMS\n\n    u�ytkownik: {LOGIN}\n    has�o: {PASSWORD}\n\n\nPrzez t� stron� mo�esz si� zalogowa�: {LOGIN_PAGE}\n\nphpwcms admin\n ";
$BL['be_admin_usr_title']               = 'dodaj nowe konto u�ytkownika';
$BL['be_admin_usr_realname']            = 'prawdziwe imi�';
$BL['be_admin_usr_setactive']           = 'ustaw konto jako aktywne';
$BL['be_admin_usr_iflogin']             = 'je�li w��czone, u�ytkownik mo�e si� logowa�';
$BL['be_admin_usr_isadmin']             = 'u�ytkownik jest administratorem';
$BL['be_admin_usr_ifadmin']             = 'je�li w��czone, u�ytkownik ma prawa administratora';
$BL['be_admin_usr_verify']              = 'weryfikacja';
$BL['be_admin_usr_sendemail']           = 'wy�lij email do nowego u�ytkownika z informcj� o jego koncie';
$BL['be_admin_usr_button']              = 'zapisz dane u�ytkownika';

// admin.edituser.tmpl.php
$BL['be_admin_usr_etitle']              = 'edycja konta u�ytkownika';
$BL['be_admin_usr_emailsubject']        = 'phpwcms - dane konta zosta�y zmienione';
$BL['be_admin_usr_emailbody']           = "KONTO U�YTKOWNIKA W PHPWCMS ZOSTA�O ZMIENIONE \n\n    nazwa u�ytkownika: {LOGIN}\n    has�o: {PASSWORD}\n\n\nPrzez t� stron� mo�esz si� zalogowa�:: {LOGIN_PAGE}\n\nphpwcms admin\n ";
$BL['be_admin_usr_passnochange']        = '[NIE ZMIENIONO - PODAJ PRAWID�OW HAS�O]';
$BL['be_admin_usr_ebutton']             = 'uaktualnij dane u�ytkownika';

// admin.listuser.tmpl.php
$BL['be_admin_usr_ltitle']              = 'lista u�ytkownik�w systemu';
$BL['be_admin_usr_ldel']                = 'UWAGA!&#13;Wybrana akcja spowoduje skasowanie u�ytkownika!';
$BL['be_admin_usr_create']              = 'utw�rz nowego u�ytkownika';
$BL['be_admin_usr_editusr']             = 'edytuj u�ytkownika';

// admin.structform.tmpl.php
$BL['be_admin_struct_title']            = 'struktura witryny';
$BL['be_admin_struct_child']            = '(potomek)';
$BL['be_admin_struct_index']            = 'index (pocz�tek witryny)';
$BL['be_admin_struct_cat']              = 'tytu� poziomu';
$BL['be_admin_struct_hide1']            = 'ukryj';
$BL['be_admin_struct_hide2']            = 'ten&nbsp;poziom&nbsp;w&nbsp;menu';
$BL['be_admin_struct_info']             = 'informacja o poziomie';
$BL['be_admin_struct_template']         = 'szablon';
$BL['be_admin_struct_alias']            = 'alias poziomu';
$BL['be_admin_struct_visible']          = 'widoczna';
$BL['be_admin_struct_button']           = 'zapisz dane poziomu';
$BL['be_admin_struct_close']            = 'zamknij';

// admin.filecat.tmpl.php
$BL['be_admin_fcat_title']              = 'kategorie plik�w';
$BL['be_admin_fcat_err']                = 'nazwa kategorii jest pusta!';
$BL['be_admin_fcat_name']               = 'nazwa kategorii';
$BL['be_admin_fcat_needed']             = 'trzeba u�ywa�';
$BL['be_admin_fcat_button1']            = 'uaktualnij';
$BL['be_admin_fcat_button2']            = 'utw�rz';
$BL['be_admin_fcat_delmsg']             = 'Czy na pewno chcesz\nskasowa� rozszerzenie plik�w?';
$BL['be_admin_fcat_fcat']               = 'kategoria plik�w';
$BL['be_admin_fcat_err1']               = 'nazwa rozszerzenia jest pusta!';
$BL['be_admin_fcat_fkeyname']           = 'nazwa&nbsp;rozszerzenia';
$BL['be_admin_fcat_exit']               = 'anuluj';
$BL['be_admin_fcat_addkey']             = 'dodaj nowe rozszerzenie';
$BL['be_admin_fcat_editcat']            = 'edytuj kategori�';
$BL['be_admin_fcat_delcatmsg']          = 'Czy na pewno chcesz\nusun�� kategori� plik�w?';
$BL['be_admin_fcat_delcat']             = 'usu� kategori� plik�w';
$BL['be_admin_fcat_delkey']             = 'usu� rozszerzenie plik�w';
$BL['be_admin_fcat_editkey']            = 'edytuj rozszerzenie';
$BL['be_admin_fcat_addcat']             = 'utw�rz now� kategori� plik�w';

// admin.pagelayout.tmpl.php
$BL['be_admin_page_title']              = 'ustawienia witryny: layout witryny';
$BL['be_admin_page_align']              = 'wyr�wnanie witryny';
$BL['be_admin_page_align_left']         = 'standardowe wyr�wnanie do lewej ca�ej witryny';
$BL['be_admin_page_align_center']       = 'wy�rodkowanie ca�ej witryn�';
$BL['be_admin_page_align_right']        = 'wyr�wnanie do prawej ca�ej witryny';
$BL['be_admin_page_margin']             = 'margines';
$BL['be_admin_page_top']                = 'g�ra';
$BL['be_admin_page_bottom']             = 'd�';
$BL['be_admin_page_left']               = 'lewo';
$BL['be_admin_page_right']              = 'prawo';
$BL['be_admin_page_bg']                 = 't�o';
$BL['be_admin_page_color']              = 'kolor';
$BL['be_admin_page_height']             = 'wysoko��&nbsp;';
$BL['be_admin_page_width']              = 'szeroko��';
$BL['be_admin_page_main']               = 'g��wna';
$BL['be_admin_page_leftspace']          = 'lewy odst�p';
$BL['be_admin_page_rightspace']         = 'prawy odst�p';
$BL['be_admin_page_class']              = 'klasa';
$BL['be_admin_page_image']              = 'obraz';
$BL['be_admin_page_text']               = 'tekst';
$BL['be_admin_page_link']               = 'odno�n.';
$BL['be_admin_page_js']                 = 'javascript';
$BL['be_admin_page_visited']            = 'odwiedz.';
$BL['be_admin_page_pagetitle']          = 'tytu�&nbsp;witryny';
$BL['be_admin_page_addtotitle']         = 'dodaj&nbsp;do&nbsp;tytu�u';
$BL['be_admin_page_category']           = 'nazw� poziomu';
$BL['be_admin_page_articlename']        = 'tytu�&nbsp;artyku�u';
$BL['be_admin_page_blocks']             = 'bloki';
$BL['be_admin_page_allblocks']          = 'wszystkie bloki';
$BL['be_admin_page_col1']               = 'bloki w 3 kolumnach';
$BL['be_admin_page_col2']               = 'bloki w 2 kolumnach (g��wna kolumna z prawej, menu z lewej)';
$BL['be_admin_page_col3']               = 'bloki w 2 kolumnach (g��wna kolumna z lewej, menu z prawej)';
$BL['be_admin_page_col4']               = 'bloki w 1 kolumnie';
$BL['be_admin_page_header']             = 'nag��wek';
$BL['be_admin_page_footer']             = 'stopka';
$BL['be_admin_page_topspace']           = 'g�rny&nbsp;odst�p';
$BL['be_admin_page_bottomspace']        = 'dolny&nbsp;odst�p';
$BL['be_admin_page_button']             = 'zapisz layout';

// admin.frontendcss.tmpl.php
$BL['be_admin_css_title']               = 'ustawienie witryny: styl css';
$BL['be_admin_css_css']                 = 'css';
$BL['be_admin_css_button']              = 'zapisz styl css';

// admin.templates.tmpl.php
$BL['be_admin_tmpl_title']              = 'ustawienia witryny: szablony';
$BL['be_admin_tmpl_default']            = 'domy�lny';
$BL['be_admin_tmpl_add']                = 'dodaj&nbsp;szablon';
$BL['be_admin_tmpl_edit']               = 'edycja szablonu';
$BL['be_admin_tmpl_new']                = 'utw�rz nowy';
$BL['be_admin_tmpl_css']                = 'plik css';
$BL['be_admin_tmpl_head']               = 'nag��wek&nbsp; html';
$BL['be_admin_tmpl_js']                 = 'skrypt przy&nbsp; otwarciu';
$BL['be_admin_tmpl_error']              = 'b��d';
$BL['be_admin_tmpl_button']             = 'zapisz szablon';
$BL['be_admin_tmpl_name']               = 'nazwa';

// article.structlist.tmpl.php
$BL['be_article_title']                 = 'struktura witryny i lista artyku��w';

// article.new.tmpl.php
$BL['be_article_err1']                  = 'tytu� tego artyku�u jest pusty';
$BL['be_article_err2']                  = 'data rozpocz�cia wy�wietlania jest podana �le - ustaw na dzi�';
$BL['be_article_err3']                  = 'data zkao�czenia wy�wietlania jest podana �le - ustaw na dzi�';
$BL['be_article_title1']                = 'article basis information';
$BL['be_article_cat']                   = 'poziom';
$BL['be_article_atitle']                = 'tytu� artyku�u';
$BL['be_article_asubtitle']             = 'podtytu�';
$BL['be_article_abegin']                = 'rozp.';
$BL['be_article_aend']                  = 'zako�.';
$BL['be_article_aredirect']             = 'przekieruj do';
$BL['be_article_akeywords']             = 's�owa <br/>kluczowe';
$BL['be_article_asummary']              = 'podsumowanie';
$BL['be_article_abutton']               = 'utw�rz nowy artyku�';

// article.editcontent.inc.php
$BL['be_article_err4']                  = 'data zako�czenia wy�wietlania jest podana �le - ustaw na tydzie� od dzi�';

// article.editsummary.tmpl.php
$BL['be_article_estitle']               = 'edycja podstawowych danych artyku�u';
$BL['be_article_eslastedit']            = 'ostatnio edytowany';
$BL['be_article_esnoupdate']            = 'formularz nie zaktualizowany';
$BL['be_article_esbutton']              = 'zaktualizuj dane artyku�u';

// articlecontent.edit.tmpl.php
$BL['be_article_cnt_title']             = 'tre�� artyku�u';
$BL['be_article_cnt_type']              = 'typ tre�ci';
$BL['be_article_cnt_space']             = 'odst�p';
$BL['be_article_cnt_before']            = 'przed';
$BL['be_article_cnt_after']             = 'po';
$BL['be_article_cnt_top']               = 'na g�rze';
$BL['be_article_cnt_toplink']           = 'wy�wietl odno�nik : na g�r�';
$BL['be_article_cnt_ctitle']            = 'tytu� tre�ci';
$BL['be_article_cnt_back']              = 'pe�ne dane artyku�u';
$BL['be_article_cnt_button1']           = 'Zaktualizuj';
$BL['be_article_cnt_button2']           = 'Utw�rz';
$BL['be_article_cnt_button3']           = 'Zapisz i zamknij';

// articlecontent.list.tmpl.php
$BL['be_article_cnt_ltitle']            = 'dane artyku�u';
$BL['be_article_cnt_ledit']             = 'edytuj artyku�';
$BL['be_article_cnt_lvisible']          = 'prze��cz widoczny/niewidoczny';
$BL['be_article_cnt_ldel']              = 'usu� artyku�';
$BL['be_article_cnt_ldeljs']            = 'Czy na pewno usun�� artyku�?';
$BL['be_article_cnt_redirect']          = 'przekierowanie';
$BL['be_article_cnt_edited']            = 'edytowane przez';
$BL['be_article_cnt_start']             = 'data rozp.';
$BL['be_article_cnt_end']               = 'data zako�.';
$BL['be_article_cnt_add']               = 'dodaj';
$BL['be_article_cnt_addtitle']          = 'dodaj now� tre��';
$BL['be_article_cnt_up']                = 'przesu� w g�r� tre��';
$BL['be_article_cnt_down']              = 'przesu� w d� tre��';
$BL['be_article_cnt_edit']              = 'edytuj tre��';
$BL['be_article_cnt_delpart']           = 'usu� tre�� z artyku�u';
$BL['be_article_cnt_delpartjs']         = 'Czy na pewno usun�� tre�� z artyku�u?';
$BL['be_article_cnt_center']            = 'centrum artyku��w';

// content forms
$BL['be_cnt_plaintext']                 = 'czysty tekst';
$BL['be_cnt_htmltext']                  = 'tekst w formacie html';
$BL['be_cnt_image']                     = 'obraz';
$BL['be_cnt_position']                  = 'pozycja';
$BL['be_cnt_pos0']                      = 'Ponad, z lewej';
$BL['be_cnt_pos1']                      = 'Ponad, na �rodku';
$BL['be_cnt_pos2']                      = 'Ponad, z prawej';
$BL['be_cnt_pos3']                      = 'Pod, z lewej';
$BL['be_cnt_pos4']                      = 'Pod, na �rodku';
$BL['be_cnt_pos5']                      = 'Pod, z prawej';
$BL['be_cnt_pos6']                      = 'W tek�cie, po lewej';
$BL['be_cnt_pos7']                      = 'W tek�cie, po prawej';
$BL['be_cnt_pos0i']                     = 'wyr�wnaj obraz ponad i z lewej strony tesktu';
$BL['be_cnt_pos1i']                     = 'wyr�wnaj obraz ponad i po�rodku tesktu';
$BL['be_cnt_pos2i']                     = 'wyr�wnaj obraz ponad i z prawej strony tekstu';
$BL['be_cnt_pos3i']                     = 'wyr�wnaj obraz pod i z lewej strony tekstu';
$BL['be_cnt_pos4i']                     = 'wyr�wnaj obraz pod i po�rodku tekstu';
$BL['be_cnt_pos5i']                     = 'wyr�wnaj obraz pod i z prawej strony tekstu';
$BL['be_cnt_pos6i']                     = 'umie�� obraz wewn�trz tekstu i wyr�wnaj do lewej';
$BL['be_cnt_pos7i']                     = 'umie�� obraz wewn�trz tesktu i wyr�wnaj do prawej';
$BL['be_cnt_maxw']                      = 'maks.&nbsp;szer.';
$BL['be_cnt_maxh']                      = 'maks.&nbsp;wys.';
$BL['be_cnt_enlarge']                   = 'w��cz&nbsp;powi�kszanie';
$BL['be_cnt_caption']                   = 'podpis';
$BL['be_cnt_subject']                   = 'tytu�&nbsp;<br/>wiadomo�ci';
$BL['be_cnt_recipient']                 = 'odbiorca';
$BL['be_cnt_buttontext']                = 'tekst przycisku';
$BL['be_cnt_sendas']                    = 'wy�lij jako';
$BL['be_cnt_text']                      = 'tekst';
$BL['be_cnt_html']                      = 'html';
$BL['be_cnt_formfields']                = 'pola&nbsp;<br/> formularza';
$BL['be_cnt_code']                      = 'kod programistyczny';
$BL['be_cnt_infotext']                  = 'tekst&nbsp;informacji';
$BL['be_cnt_subscription']              = 'subskrypcja';
$BL['be_cnt_labelemail']                = 'etykieta&nbsp;email';
$BL['be_cnt_tablealign']                = 'wyr�wnanie&nbsp;tabeli';
$BL['be_cnt_labelname']                 = 'nazwa&nbsp;etykiety';
$BL['be_cnt_labelsubsc']                = 'subskr.&nbsp;etykiety';
$BL['be_cnt_allsubsc']                  = 'wszyscy&nbsp;subskr.';
$BL['be_cnt_default']                   = 'domyl�ne';
$BL['be_cnt_left']                      = 'lewo';
$BL['be_cnt_center']                    = '�rodek';
$BL['be_cnt_right']                     = 'prawo';
$BL['be_cnt_buttontext']                = 'tekst&nbsp;przycisku';
$BL['be_cnt_successtext']               = 'tekst&nbsp;sukcesu';
$BL['be_cnt_regmail']                   = 'zarejestr.email';
$BL['be_cnt_logoffmail']                = 'wy��cz.email';
$BL['be_cnt_changemail']                = 'zmie�.email';
$BL['be_cnt_openimagebrowser']          = 'otw�rz przegl�dark� grafiki';
$BL['be_cnt_openfilebrowser']           = 'otw�rz przegl�dark� plik�w';
$BL['be_cnt_sortup']                    = 'do g�ry';
$BL['be_cnt_sortdown']                  = 'do do�u';
$BL['be_cnt_delimage']                  = 'usu� wybrane grafiki';
$BL['be_cnt_delfile']                   = 'usu� wybrane pliki';
$BL['be_cnt_delmedia']                  = 'usu� wybrane multimedia';
$BL['be_cnt_column']                    = 'kolumna(y)';
$BL['be_cnt_imagespace']                = 'odst�p&nbsp;obrazka';
$BL['be_cnt_directlink']                = 'bezpo�redni odno�nik';
$BL['be_cnt_target']                    = 'cel';
$BL['be_cnt_target1']                   = 'w nowym oknie';
$BL['be_cnt_target2']                   = 'w g��wenj ramce okna';
$BL['be_cnt_target3']                   = 'w tym samym oknie';
$BL['be_cnt_target4']                   = 'w tej samej ramce lub oknie';
$BL['be_cnt_bullet']                    = 'lista (jako tablica)';
$BL['be_cnt_ullist']     		= 'lista';
$BL['be_cnt_ullist_desc']     		= '~ = 1szy poziom, &nbsp; ~~ = 2gi poziom, &nbsp; itd.';
$BL['be_cnt_linklist']                  = 'lista odno�nik�w';
$BL['be_cnt_plainhtml']                 = 'czysty html';
$BL['be_cnt_files']                     = 'pliki';
$BL['be_cnt_description']               = 'opis';
$BL['be_cnt_linkarticle']               = 'odno�niki do&nbsp;<br/>artyku��w';
$BL['be_cnt_articles']                  = 'artyku�y';
$BL['be_cnt_movearticleto']             = 'przesu� wybrane artyku�y do listy artyku��w';
$BL['be_cnt_removearticleto']           = 'usu� wybrane artyku�y z listy artyku��w';
$BL['be_cnt_mediatype']                 = 'typ medium';
$BL['be_cnt_control']                   = 'kontrola';
$BL['be_cnt_showcontrol']               = 'poka� pasek kontroli';
$BL['be_cnt_autoplay']                  = 'autoodtwarzanie';
$BL['be_cnt_source']                    = '�r�d�o';
$BL['be_cnt_internal']                  = 'wewn�trzne';
$BL['be_cnt_openmediabrowser']          = 'otw�rz przegl�dark� multimedi�w';
$BL['be_cnt_external']                  = 'zewn�trzne';
$BL['be_cnt_mediapos0']                 = 'po lewej (domy�lnie)';
$BL['be_cnt_mediapos1']                 = 'na �rodku';
$BL['be_cnt_mediapos2']                 = 'poprawej';
$BL['be_cnt_mediapos3']                 = 'w tek�cie, po lewej';
$BL['be_cnt_mediapos4']                 = 'w tek�cie, po prawej';
$BL['be_cnt_mediapos0i']                = 'wyr�wnaj media ponad i do lewej strony tekstu';
$BL['be_cnt_mediapos1i']                = 'wyr�wnaj media ponad i po�rodku tesktu';
$BL['be_cnt_mediapos2i']                = 'wyr�wnaj media ponad i do prawej strony tekstu';
$BL['be_cnt_mediapos3i']                = 'umie�� media wewn�trz tesktu i wyr�wnaj do lewej';
$BL['be_cnt_mediapos4i']                = 'umie�� media wewn�trz tesktu i wyr�wnaj do prawej';
$BL['be_cnt_setsize']                   = 'ustaw rozmiar';
$BL['be_cnt_set1']                      = 'ustaw rozmiar na 160x120px';
$BL['be_cnt_set2']                      = 'ustaw rozmiar na 240x180px';
$BL['be_cnt_set3']                      = 'ustaw rozmiar na 320x240px';
$BL['be_cnt_set4']                      = 'ustaw rozmiar na 480x360px';
$BL['be_cnt_set5']                      = 'wyczy�� wysoko�� i szeroko��';

// added: 28-12-2003
$BL['be_admin_page_add']                = 'utw�rz nowy layout';
$BL['be_admin_page_name']               = 'nazwa layoutu';
$BL['be_admin_page_edit']               = 'edytuj layout';
$BL['be_admin_page_render']             = 'renderowanie';
$BL['be_admin_page_table']              = 'tabela';
$BL['be_admin_page_div']                = 'css div';
$BL['be_admin_page_custom']             = 'w�asne';
$BL['be_admin_page_custominfo']         = 'z szablonu g��wnego bloku';
$BL['be_admin_tmpl_layout']             = 'layout';
$BL['be_admin_tmpl_nolayout']           = 'Brak layoutu!';

// added: 31-12-2003
$BL['be_ctype_search']                  = 'wyszukiwarka';
$BL['be_cnt_results']                   = 'rezultat�w';
$BL['be_cnt_results_per_page']          = 'na&nbsp;stron� (je�li puste, pokazuje wszystkie)';
$BL['be_cnt_opennewwin']                = 'w nowym oknie';
$BL['be_cnt_searchlabeltext']           = 'Wstaw swoje komunikaty, kt�re pokazuj� si� gdy jest wi�cej znalezionych artyku��w ni� mie�ci jedna strona.';
$BL['be_cnt_input']                     = 'wybierz';
$BL['be_cnt_style']                     = 'styl';
$BL['be_cnt_result']                    = 'rezultat';
$BL['be_cnt_next']                      = 'nast�pny';
$BL['be_cnt_previous']                  = 'poprzedni';
$BL['be_cnt_align']                     = 'wyr�wnanie';
$BL['be_cnt_searchformtext']            = 'Wstaw swoje komunikaty gdy u�ytkownik otworzy strone wyszukiwarki lub gdy nie ma rezultat�w.';
$BL['be_cnt_intro']                     = 'nag��wek';
$BL['be_cnt_noresult']                  = 'brak&nbsp; rezultat�w';

// added: 02-01-2004
$BL['be_admin_page_disable']            = 'wy��czone';

// added: 09-01-2004
$BL['be_article_articleowner']          = 'w�a�ciciel artyku�u';
$BL['be_article_adminuser']             = 'administrator';
$BL['be_article_username']              = 'autor';

// added: 10-01-2004
$BL['be_ctype_wysywig']                 = 'WYSIWYG HTML';

// added, changed: 11-01-2004
$BL['be_admin_struct_regonly']          = 'widoczne tylko dla zalogowanych uzytkownik�w';
$BL['be_admin_struct_status']           = 'status dost�pno�ci w menu';

// added: 15-02-2004
$BL['be_ctype_articlemenu']		= 'menu artyku��w';
$BL['be_cnt_sitelevel']			= 'poziom struktury';
$BL['be_cnt_sitecurrent']		= 'obecny poziom struktury';

// added: 24-03-2004
$BL['be_subnav_admin_starttext']	= 'tekst na stronie startowej';
$BL['be_ctype_ecard']			= 'kartka elektroniczna';
$BL['be_ctype_blog']			= 'blog';
$BL['be_cnt_ecardtext']                 = 'tytu�/kartka elektroniczna';
$BL['be_cnt_ecardtmpl']                 = 'szablon wiadomo�ci';
$BL['be_cnt_ecard_image']               = 'obrazek kartki';
$BL['be_cnt_ecard_title']               = 'tytu� kartki';
$BL['be_cnt_alignment']                 = 'wyr�wnanie';
$BL['be_cnt_ecardform']                 = 'szablon formularza';
$BL['be_cnt_ecardform_err']             = 'Wszystkie pola oznaczone * s� wymagalne';
$BL['be_cnt_ecardform_sender']          = 'Nadawca';
$BL['be_cnt_ecardform_recipient']       = 'Obiorca';
$BL['be_cnt_ecardform_name']            = 'Nazwa';
$BL['be_cnt_ecardform_msgtext']         = 'Twoja wiadomo�� do odbiorcy';
$BL['be_cnt_ecardform_button']          = 'wyslij kartk�';
$BL['be_cnt_ecardsend']                 = 'szablon wysy�ki';

// added: 28-03-2004
$BL['be_admin_startup_title']           = 'domy�lny tekst na stronie startowej systemu phpWCMS';
$BL['be_admin_startup_text']            = 'tre�� tekstu';
$BL['be_admin_startup_button']          = 'zapisz tekst';

// added: 17-04-2004
$BL['be_ctype_guestbook']		= 'ksi�ga go�ci/komentarze';
$BL['be_cnt_guestbook_listing']		= 'pokazuj';
$BL['be_cnt_guestbook_listing_all']	= 'poka�&nbsp;wszystkie&nbsp;wpisy';
$BL['be_cnt_guestbook_list']		= 'wpis�w';
$BL['be_cnt_guestbook_perpage']		= 'na&nbsp;stron�';
$BL['be_cnt_guestbook_form']		= 'formularz';
$BL['be_cnt_guestbook_signed']		= 'podpisane';
$BL['be_cnt_guestbook_nav']		= 'nawig';
$BL['be_cnt_guestbook_before']		= 'przed';
$BL['be_cnt_guestbook_after']		= 'po';
$BL['be_cnt_guestbook_entry']		= 'wpis';
$BL['be_cnt_guestbook_edit']		= 'edycja';
$BL['be_cnt_ecardform_selector']        = 'wybierz';
$BL['be_cnt_ecardform_radiobutton']     = 'pole wyboru';
$BL['be_cnt_ecardform_javascript']      = 'funkcjonalno�� JavaScript';
$BL['be_cnt_ecardform_over']        	= 'onMouseOver';
$BL['be_cnt_ecardform_click']       	= 'onClick';
$BL['be_cnt_ecardform_out']       	= 'onMouseOut';
$BL['be_admin_struct_topcount']         = 'ilo�c artyku��w na g�rze';

// added: 19-04-2004
$BL['be_subnav_msg_newslettersend']     = 'nowo�ci';
$BL['be_newsletter_addnl']              = 'dodaj nowo��';
$BL['be_newsletter_titleeditnl']        = 'edycja nowo�ci';
$BL['be_newsletter_newnl']              = 'utw�rz now�';
$BL['be_newsletter_button_savenl']      = 'zapisz nowo��';
$BL['be_newsletter_fromname']           = 'nazwa od';
$BL['be_newsletter_fromemail']          = 'email od';
$BL['be_newsletter_replyto']            = 'email odp';
$BL['be_newsletter_changed']            = 'ostanio&nbsp; zmieniono';
$BL['be_newsletter_placeholder']        = 'umie��';
$BL['be_newsletter_htmlpart']           = 'tre�� nowo�ci w HTML';
$BL['be_newsletter_textpart']           = 'tre�� nowo�ci tekstowa';
$BL['be_newsletter_allsubscriptions']   = 'wszystkie subskrypcje';
$BL['be_newsletter_verifypage']         = 'sprawd� odno�nik';
$BL['be_newsletter_open']               = 'pola wprowadzania tre�ci nowo�ci';
$BL['be_newsletter_open1']              = '(kliknij �eby otworzy� edytor)';
$BL['be_newsletter_sendnow']            = 'wy�lij teraz';
$BL['be_newsletter_attention']          = '<strong style="color:#CC3300;">Uwaga!</strong> Wysy�anie wielu nowo�ci naraz do du�ej ilo�� odbiorc�w jest niebezpieczne. Odbiorcy powinni by� zweryfikowani inaczej Twoja wysy�ka mo�e zosta� potraktowana jako SPAM. .Pomy�l dwa razy zanim wy�lesz nowo�ci. Sprawd� nowo�ci poprzez wysy�k� testu.';
$BL['be_newsletter_attention1']         = 'Je�li dokona�e� zmian w nowo�ci, zapisz j� najpierw inaczej nie zostanie ona u�yta.'; 
$BL['be_newsletter_testemail']          = 'testuj email';
$BL['be_newsletter_sendnlbutton']       = 'wy�lij nowo��';
$BL['be_newsletter_sendprocess']        = 'proces wysy�ania';
$BL['be_newsletter_attention2']         = '<strong style="color:#CC3300;">Uwaga!</strong> Prosz� nie przerywa� procesu wysy�ania. Inaczej mo�e zaistnie� mo�liwo�� wys�ania tej samej nowo�ci dwa razy do tego samego odbiorcy.';
$BL['be_newsletter_testerror']          = '<span style="color:#CC3300;font-size:11px;">adres testowy <strong>###TEST###</strong> jest nie poprawny!<br />&nbsp;<br />Prosz� spr�buj ponownie!';
$BL['be_newsletter_to']                 = 'Odbiorcy';
$BL['be_newsletter_ready']              = 'wysy�anie nowo�ci: zako�czono';
$BL['be_newsletter_readyfailed']        = 'Nie uda�o si� wys�a� nowo�ci do';
$BL['be_subnav_msg_subscribers']        = 'subskrynenci nowo�ci';

// added: 20-04-2004
$BL['be_ctype_sitemap']			= 'mapa witryny';
$BL['be_cnt_sitemap_catimage']          = 'ikona poziomu';
$BL['be_cnt_sitemap_articleimage']      = 'ikona artyku�u';
$BL['be_cnt_sitemap_display']           = 'wy�wietl';
$BL['be_cnt_sitemap_structuronly']      = 'tylko poziomy struktury';
$BL['be_cnt_sitemap_structurarticle']   = 'poziomy struktury i artyku�y';
$BL['be_cnt_sitemap_catclass']          = 'klasa poziomu';
$BL['be_cnt_sitemap_articleclass']      = 'klasa artyku�u';
$BL['be_cnt_sitemap_count']             = 'licznik';
$BL['be_cnt_sitemap_classcount']        = 'dodaj do nazwy klasy';
$BL['be_cnt_sitemap_noclasscount']      = 'nie dodawaj do nazwy klasy';

// added: 23-04-2004
$BL['be_ctype_bid']			= 'aukcja';
$BL['be_cnt_bid_bidtext']               = 'tre�� aukcji';
$BL['be_cnt_bid_sendtext']              = 'tekst do&nbsp; wys�ania';
$BL['be_cnt_bid_verifiedtext']          = 'tekst&nbsp; weryfikacji';
$BL['be_cnt_bid_errortext']             = 'aukcja&nbsp; usuni�ta';
$BL['be_cnt_bid_verifyemail']           = 'weryfikacja&nbsp; emaila';
$BL['be_cnt_bid_startbid']              = 'rozpocznij od';

// added: 29-04-2004
$BL['be_cnt_bid_nextbidadd']            = 'zwi�ksz&nbsp;o';

// added: 10-05-2004
$BL['be_ctype_pages']                   = 'zewn�trzna tre��';
$BL['be_cnt_pages_select']              = 'wybierz plik';
$BL['be_cnt_pages_fromfile']            = 'plik ze struktury';
$BL['be_cnt_pages_manually']            = 'w�asna �cie�ka/plik lub adres URL';
$BL['be_cnt_pages_cust']                = 'plik/URL';
$BL['be_cnt_pages_from']                = '�r�d�o';

// added: 24-05-2004
$BL['be_ctype_reference']               = 'przewujalna grafika';
$BL['be_cnt_reference_basis']           = 'wyr�wnanie';
$BL['be_cnt_reference_horizontal']      = 'poziomo';
$BL['be_cnt_reference_vertical']        = 'pionowo';
$BL['be_cnt_reference_aligntext']       = 'ma�e obrazki';
$BL['be_cnt_reference_largetext']       = 'du�e obrazki';
$BL['be_cnt_reference_zoom']            = 'powi�kszenie';
$BL['be_cnt_reference_middle']          = 'po�rodku';
$BL['be_cnt_reference_border']          = 'ramka';
$BL['be_cnt_reference_block']           = 'blok sz x w';

// added: 31-05-2004
$BL['be_article_rendering']             = 'renderowanie';
$BL['be_article_nosummary']             = 'nie wy�wietlaj podsumowania razem z ca�o�ci� artyku�u';
$BL['be_article_forlist']               = 'wylistuj artyku�';
$BL['be_article_forfull']               = 'wy�wietl ca�y artyku�';

// added: 08-07-2004
$BL["setup_dir_exists"]                 = '<strong>Uwaga!</strong> Katalog &quot;SETUP&quot; nadal istnieje! Skasuj ten katalog - mo�e by� on przyczyn� potencjalnych problem�w z bezpiecze�stwem.';

// added: 12-08-2004
$BL['be_cnt_guestbook_banned']          = 'zabronione&nbsp; s�owa';
$BL['be_cnt_guestbook_flooding']        = 'blokady';
$BL['be_cnt_guestbook_setcookie']       = 'ustaw cookie';
$BL['be_cnt_guestbook_allowed']         = 'zezw�l ponownie po';
$BL['be_cnt_guestbook_seconds']         = 'sekundach';
$BL['be_alias_ID']                      = 'ID aliasu';
$BL['be_ftrash_delall']                 = "Czy chesz na pewno usun�� \nWSZYSTKIE PLIKI z kosza?";
$BL['be_ftrash_delallfiles']            = 'usu� wszystkie pliki z kosza';

// added: 16-08-2004
$BL['be_subnav_msg_importsubscribers']  = 'import subskrybent�w z pliku CSV';
$BL['be_newsletter_importtitle']        = 'Importuj Subskrybent�w Nowo�ci';
$BL['be_newsletter_entriesfound']       = 'znaleziono&nbsp;wpis�w';
$BL['be_newsletter_foundinfile']        = 'w pliku';
$BL['be_newsletter_addresses']          = 'adresy';
$BL['be_newsletter_csverror']           = 'Importowany plik CSV jest niepoprawny!';
$BL['be_newsletter_importall']          = 'importuj wszystkie wpisy';
$BL['be_newsletter_addressesadded']     = 'adresy dodano.';
$BL['be_newsletter_newimport']          = 'nowy import';
$BL['be_newsletter_importerror']        = 'Prosz� sprawd� sw�j plik CSV - nie ma w nim �adnych adres�w!';
$BL['be_newsletter_shouldbe1']          = 'Tw�j plik CSV powinien by� sformatowany tak jak';
$BL['be_newsletter_shouldbe2']          = 'ale mo�esz wybra� sw�j w�asny znak rozdzielaj�cy';
$BL['be_newsletter_sample']             = 'przyk�ad';
$BL['be_newsletter_selectCSV']          = 'wybierz plik CSV';
$BL['be_newsletter_delimeter']          = 'znak rozdzielaj�cy';
$BL['be_newsletter_importCSV']          = 'importuj plik';

// added: 24-08-2004
$BL['be_admin_struct_orderarticle']     = 'ordering of assigned articles';
$BL['be_admin_struct_orderdate']        = 'data utworzenia';
$BL['be_admin_struct_orderchangedate']  = 'data zmiany';
$BL['be_admin_struct_orderstartdate']   = 'data rozp.';
$BL['be_admin_struct_orderdesc']        = 'malej�co';
$BL['be_admin_struct_orderasc']         = 'rosn�co';
$BL['be_admin_struct_ordermanual']      = 'r�cznie (w g�r�/d�)';
$BL['be_cnt_sitemap_startid']           = 'rozpocznij na';

// added: 20-10-2004
$BL['be_ctype_map']                     = 'mapa';
$BL['be_save_btn']                      = 'Zapisz';
$BL['be_cmap_location_error_notitle']   = 'wype�nij tytu� dla tej lokalizacji.';
$BL['be_cnt_map_add']                   = 'dodaj lokalizacj�';
$BL['be_cnt_map_edit']                  = 'edytuj lokalizacj�';
$BL['be_cnt_map_title']                 = 'tytu� lokalizacji';
$BL['be_cnt_map_info']                  = 'wpis/informacja';
$BL['be_cnt_map_list']                  = 'lista lokalizacji';
$BL['be_btn_delete']                    = 'Czy na pewno chcesz\nusun�� lokalizacj�?';

// added: 05-11-2004
$BL['be_ctype_phpvar']                  = 'zmienne PHP';
$BL['be_cnt_vars']                      = 'zmienne';

// added: 19-11-2004 -- copy - Fernando Batista http://fernandobatista.web.pt
$BL['be_func_struct_copy']              = 'kopiuj artyku�';
$BL['be_func_struct_nocopy']            = 'anuluj kopiowanie';
$BL['be_func_struct_copy_level']        = 'kopiuj poziom struktury';
$BL['be_func_struct_no_copy']           = "Nie mo�na kopiowa� g��wnego poziomu struktury!";

// added: 27-11-2004
$BL['be_date_minute']                   = 'minuta';
$BL['be_date_minutes']                  = 'minuty';
$BL['be_date_hour']                     = 'godzina';
$BL['be_date_hours']                    = 'godziny';
$BL['be_date_day']                      = 'dzie�';
$BL['be_date_days']                     = 'dni';
$BL['be_date_week']                     = 'tydzie�';
$BL['be_date_weeks']                    = 'tygodnie';
$BL['be_date_month']                    = 'miesi�c';
$BL['be_date_months']                   = 'miesi�ce';
$BL['be_off']                           = 'wy��cz';
$BL['be_on']                            = 'w��cz';
$BL['be_cache']                         = 'cache';
$BL['be_cache_timeout']                 = 'czas wygasn.';

// added: 13-12-2004
$BL['be_subnav_admin_groups']		= 'u�ytkownicy i grupy';

// added: 20-12-2004
$BL['be_ctype_forum']			= 'forum';
$BL['be_subnav_msg_forum']		= 'lista for�w';
$BL['be_forum_title']			= 'tytu� forum';
$BL['be_forum_permission']		= 'uprawnienia';
$BL['be_forum_add']			= 'dodaj forum';
$BL['be_forum_titleedit']		= 'edytuj forum';

// added: 15-01-2005
$BL['be_admin_page_customblocks']       = 'w�asne';
$BL['be_show_content']                  = 'wyswietl';
$BL['be_main_content']                  = 'g��wna kolumna';
$BL['be_admin_template_jswarning']      = 'UWAGA!!! \nW�asne bloki mog� si� zmieni�! \n\nJe�eli anulujesz \nlub zresetujesz ustawienia layoutu! \n\nZmieni� szablon?\n\n';

$BL['be_ctype_rssfeed']			= 'RSS';
$BL['be_cnt_rssfeed_url']		= 'adres url RSS';
$BL['be_cnt_rssfeed_item']		= 'elementy';
$BL['be_cnt_rssfeed_max']		= 'maks.';
$BL['be_cnt_rssfeed_cut']		= 'ukryj 1szy element';

$BL['be_ctype_simpleform']		= 'formularz email';

$BL['be_cnt_onsuccess']			= 'przy sukcesie';
$BL['be_cnt_onerror']			= 'przy b��dzie';
$BL['be_cnt_onsuccess_redirect']	= 'przekieruj gdy sukces';
$BL['be_cnt_onerror_redirect']	        = 'przekieruj gdy b��d';

$BL['be_cnt_form_class']		= 'klasa formularza';
$BL['be_cnt_label_wrap']		= 'wci�cie etykiety';
$BL['be_cnt_error_class']		= 'klasa b��du';
$BL['be_cnt_req_mark']			= 'oznaczenie wymagalnosci';
$BL['be_cnt_mark_as_req']		= 'znak jako wymagalny';
$BL['be_cnt_mark_as_del']		= 'znak elementu do usuni�cia';


$BL['be_cnt_type']			= 'typ';
$BL['be_cnt_label']			= 'etykieta';
$BL['be_cnt_needed']			= 'wymagana';
$BL['be_cnt_delete']			= 'usuni�ta';
$BL['be_cnt_value']			= 'wartos�';
$BL['be_cnt_error_text']		= 'tekst b��du';
$BL['be_cnt_css_style']			= 'styl CSS';
$BL['be_cnt_send_copy_to']		= 'Kopia do';

$BL['be_cnt_field']			= array("text"=>'text (single-line)', "email"=>'email', "textarea"=>'text (multi-line)', 
												"hidden"=>'hidden', "password"=>'password', "select"=>'select menu', 
												"list"=>'list menu', "checkbox"=>'checkbox', "radio"=>'radio button', 
												"upload"=>'file', "submit"=>'send button', "reset"=>'reset button', 
												"break"=>'break', "breaktext"=>'break text', "special"=>'text (spezial)');

$BL['be_cnt_access']			= 'dost�p';
$BL['be_cnt_activated']			= 'uaktywniono';
$BL['be_cnt_available']			= 'dost�pny';
$BL['be_cnt_guests']			= 'go�cie';
$BL['be_cnt_admin']			= 'administrator';
$BL['be_cnt_write']			= 'zapisz';
$BL['be_cnt_read']			= 'czytaj';

$BL['be_cnt_no_wysiwyg_editor']		= 'wy��cz edytor WYSIWYG';
$BL['be_cnt_cache_update']		= 'zresetuj cache';
$BL['be_cnt_cache_delete']		= 'opr�nij cache';
$BL['be_cnt_cache_delete_msg']		= 'Czy na pewno chcesz opr�ni� cache?';

$BL['be_admin_usr_issection']		= 'uprawnienia do logowania';
$BL['be_admin_usr_ifsection0']		= 'witryna';
$BL['be_admin_usr_ifsection1']		= 'system wcms';
$BL['be_admin_usr_ifsection2']		= 'witryn i system wcms';

// added: 31-03-2005 -- copy&paste Article Content - Fernando Batista http://fernandobatista.web.pt
$BL['be_func_content_edit']              = 'edytuj tre�� artyku�u';
$BL['be_func_content_paste0']            = 'wklej do artyku�u';
$BL['be_func_content_paste']             = 'wklej p�niej do artyku�u';
$BL['be_func_content_cut']               = 'wytnij tre�� artyku�u';
$BL['be_func_content_no_cut']            = "Nie mo�na wyci�� tre�ci artyku�u!";
$BL['be_func_content_copy']              = 'kopiuj tre�� artyku�u';
$BL['be_func_content_no_copy']           = "Nie mo�na skopiowa� tre�ci artyku�u!";
$BL['be_func_content_paste_cancel']      = 'anuluj zmiany';

$BL['be_cnt_move_deleted'] 		 = 'skasuj usuni�te pliki';
$BL['be_cnt_move_deleted_msg'] 		 = 'Czy na pewno chcesz przesun�� wszystkie \noznaczone pliki do specjalnego folderu?  \n';

$BL['be_admin_struct_permit'] 		 = 'autoryzacja dost�pu (pozostawione puste - dost�p dla wszystkich)';
$BL['be_admin_struct_adduser_all']       = 'dodaj wszystkich u�ytkownik�w';
$BL['be_admin_struct_adduser_this']      = 'dodaj wybranych uzytkownik�w';
$BL['be_admin_struct_remove_all']        = 'usu� wszystkich u�ytkownik�w';
$BL['be_admin_struct_remove_this']       = 'usu� wybranych u�ytkownik�w';


$BL['be_ctype_alias'] 			 = 'alias tre�ci';
$BL['be_cnt_setting'] 			 = 'konfiguracja';
$BL['be_cnt_spaces'] 			 = 'odst�py oryginalnej tre�ci';
$BL['be_cnt_toplink'] 			 = 'odno�nik na g�r� oryginalnej tre�ci';
$BL['be_cnt_block'] 			 = 'wy�wietl ustawienie bloku oryginalnej tre�ci';
$BL['be_cnt_title'] 			 = 'tytu�y oryginalnej tre�ci';

$BL['be_file_replace'] 			 = 'usu� pliki';

$BL['be_alias_articleID'] 		 = 'ID artyku�u';
$BL['be_alias_useAll'] 			 = "u�yj nag��wka tego artyku�u";
$BL['be_article_morelink'] 		 = 'odno�nik [wi�cej...]';

?>
