<?php
/*
 * MyBB: AnonShare Welcome Guest
 *
 * File: anonshare_welcomeguest.php
 * 
 * Author: Vintagedaddyo
 *
 * MyBB Version: 1.8
 *
 * Plugin Version: 1.1
 *
 * 
 */

// Disallow direct access to this file for security reasons

if (!defined("IN_MYBB"))
  {
    die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
  }

$plugins->add_hook('global_start', 'anonshare_welcomeguest');

$plugins->add_hook('index_start', 'anonshare_welcomeguest');

$plugins->add_hook('portal_start', 'anonshare_welcomeguest');

function anonshare_welcomeguest_info()
  {
    
    global $lang;
    $lang->load("anonshare_welcomeguest");
    
    $lang->anonshare_welcomeguest_Desc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' . '<input type="hidden" name="cmd" value="_s-xclick">' . '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' . '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' . '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' . '</form>' . $lang->anonshare_welcomeguest_Desc;
    
    return Array(
        'name' => $lang->anonshare_welcomeguest_Name,
        'description' => $lang->anonshare_welcomeguest_Desc,
        'website' => $lang->anonshare_welcomeguest_Web,
        'author' => $lang->anonshare_welcomeguest_Auth,
        'authorsite' => $lang->anonshare_welcomeguest_AuthSite,
        'version' => $lang->anonshare_welcomeguest_Ver,
        'compatibility' => $lang->anonshare_welcomeguest_Compat
    );
  }

function anonshare_welcomeguest_activate()
  {
    
    require_once MYBB_ROOT . '/inc/adminfunctions_templates.php';
    find_replace_templatesets('index', '#' . preg_quote('{$anonshare_welcomeguest}
') . '#i', '', 0);
    find_replace_templatesets('portal', '#' . preg_quote('{$anonshare_welcomeguest}
') . '#i', '', 0);
    find_replace_templatesets('index', '#' . preg_quote('{$forums}') . '#i', '{$anonshare_welcomeguest}
{$forums}');
    find_replace_templatesets('portal', '#' . preg_quote('{$announcements}') . '#i', '{$anonshare_welcomeguest}
{$announcements}');
    
    // activate stylesheet
    
    global $db;
    
    $stylesheet = '@media only screen and (max-width: 400px) { 
.anonshare_welcome_msg {
 margin-bottom:48px;
}
}

.trow1.anonshare_welcome_body {
	background: #161616 url("images/anonshare_welcome/trow1-body1.png") no-repeat 50% 50%;
	background-size: cover;
	min-height: 220px;
	position: relative;
}

.anonshare_welcome_msg {
	padding: 5px;
	font-size: 14px;
	font-weight: bold;
	color: #ffffff;
}

.anonshare_welcome_stats {
	color: #3f9889;
}

.anonshare_welcome_buttons {
 position: absolute;
 padding: 5px;
 right: 0;
 bottom: 0;	
}

.anonshare_welcome_question {
	font-weight: bold;
	color: #ffffff;
}

a.anonshare_welcome_button_login {
	background: #3f9889;
	color: #fff;
	text-shadow: rgba(0,0,0,0.4) 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	display: inline-block;
	padding: 6px 8px;
	margin: 2px 2px 6px 2px;
	transition: text-shadow 3s;
	-moz-transition: text-shadow 3s;
	-webkit-transition: text-shadow 3s;
	-o-transition: text-shadow 3s;
	font-family: "Roboto Condensed", sans-serif;
	font-size: 14px;
	font-style: normal;
}

a.anonshare_welcome_button_login:hover {
	background: #646464;
	color: #fff;
	text-shadow: #82241f 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-webkit-transition: background-color 600ms linear, color 600ms linear;
	-moz-transition: background-color 600ms linear, color 600ms linear;
	-o-transition: background-color 600ms linear, color 600ms linear;
	-ms-transition: background-color 600ms linear, color 600ms linear;
	transition: background-color 600ms linear, color 600ms linear;
}

a.anonshare_welcome_button_register {
	background: #3f9889;
	color: #fff;
	text-shadow: rgba(0,0,0,0.4) 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	display: inline-block;
	padding: 6px 8px;
	margin: 2px 2px 6px 2px;
	transition: text-shadow 3s;
	-moz-transition: text-shadow 3s;
	-webkit-transition: text-shadow 3s;
	-o-transition: text-shadow 3s;
	font-family: "Roboto Condensed", sans-serif;
	font-size: 14px;
	font-style: normal;
}

a.anonshare_welcome_button_register:hover {
	background: #646464;
	color: #fff;
	text-shadow: #82241f 0px 1px 1px;
	-moz-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-webkit-box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	box-shadow: rgba(0,0,0,0.15) 0px 1px 3px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	-webkit-transition: background-color 600ms linear, color 600ms linear;
	-moz-transition: background-color 600ms linear, color 600ms linear;
	-o-transition: background-color 600ms linear, color 600ms linear;
	-ms-transition: background-color 600ms linear, color 600ms linear;
	transition: background-color 600ms linear, color 600ms linear;
}

.anonshare_welcome_button_icon {
	font-size: 16px;
	color: #ffffff;
}';
    
    $new_stylesheet = array(
        'name' => 'anonshare_welcomeguest.css',
        'tid' => 1,
        'attachedto' => '',
        'stylesheet' => $stylesheet,
        'lastmodified' => TIME_NOW
    );
    
    $sid = $db->insert_query('themestylesheets', $new_stylesheet);
    
    $db->update_query('themestylesheets', array(
        'cachefile' => "css.php?stylesheet={$sid}"
    ), "sid='{$sid}'", 1);
    
    $query = $db->simple_select('themes', 'tid');
    
    while ($theme = $db->fetch_array($query))
      {
        
        require_once MYBB_ADMIN_DIR . 'inc/functions_themes.php';
        
        update_theme_stylesheet_list($theme['tid']);
        
      }
    
  }

function anonshare_welcomeguest_deactivate()
  {
    
    require_once MYBB_ROOT . '/inc/adminfunctions_templates.php';
    find_replace_templatesets('index', '#' . preg_quote('{$anonshare_welcomeguest}
') . '#i', '', 0);
    find_replace_templatesets('portal', '#' . preg_quote('{$anonshare_welcomeguest}
') . '#i', '', 0);
    
    // de-activate stylesheet
    
    global $db;
    $db->delete_query('themestylesheets', "name='anonshare_welcomeguest.css'");
    
    $query = $db->simple_select('themes', 'tid');
    
    while ($theme = $db->fetch_array($query))
      {
        
        require_once MYBB_ADMIN_DIR . 'inc/functions_themes.php';
        update_theme_stylesheet_list($theme['tid']);
        
      }
    
  }

function anonshare_welcomeguest_lang()
  {
    
    global $lang;
    $lang->load("anonshare_welcomeguest");
  }

function anonshare_welcomeguest()
  {
    
    global $mybb;
    
    if ($mybb->user['usergroup'] == 1)
      {
        global $theme, $lang, $anonshare_welcomeguest, $stats;
        
        
        anonshare_welcomeguest_lang();
        
        $anonshare_welcomeguest = '
		<table border="0" cellspacing="' . $theme['borderwidth'] . '" cellpadding="' . $theme['tablespace'] . '" class="tborder">
	<thead>
		<tr>
			<td class="thead">
				<strong>' . $lang->anonshare_welcomeguest_hello . '</strong>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="trow1 anonshare_welcome_body">
		<div class="anonshare_welcome_msg float_left"><h1>' . $lang->anonshare_welcomeguest_shout . '</h1>
 ' . $lang->anonshare_welcomeguest_create . '
        <ul>
            <li>' . $lang->anonshare_welcomeguest_discuss . ' <span class="anonshare_welcome_stats">' . $stats['numusers'] . '</span> ' . $lang->anonshare_welcomeguest_othermembers . '<span class="anonshare_welcome_stats">' . $stats['numthreads'] . '</span>' . $lang->anonshare_welcomeguest_topics . '</li>
            <li>' . $lang->anonshare_welcomeguest_browse . '<span class="anonshare_welcome_stats">' . $stats['numposts'] . '</span>' . $lang->anonshare_welcomeguest_posts . '</li>
        </ul>
     </div>
    <br />
 <div class="float_right"> 
<span class="anonshare_welcome_buttons">    
 <span class="anonshare_welcome_question">' . $lang->anonshare_welcomeguest_question . '</span>
<br />
        <a class="anonshare_welcome_button_register" href="' . $mybb->settings['bburl'] . '/member.php?action=register"><i class="fa fa-plus-circle fa-fw anonshare_welcome_button_icon"></i> 
            ' . $lang->anonshare_welcomeguest_createacct . '
      </a>
        <a class="anonshare_welcome_button_login" href="' . $mybb->settings['bburl'] . '/member.php?action=login"onclick="$(\'#quick_login\').modal({ fadeDuration: 250, keepelement: true }); return false;"><i " class="fa fa-check-circle-o fa-fw anonshare_welcome_button_icon"></i> ' . $lang->anonshare_welcomeguest_loginacct . '</font>
      </a>
     </span>
    </div>
    <br />
   </td>
		</tr>
	</tbody>
</table>
<br />';
      }
  }

?>