<?php defined('SYSPATH') OR die('No direct access allowed.');

// mmi/template/content/header

// Logo
if ($is_homepage)
{
	echo '<h1>'.PHP_EOL;
}
echo '<a id="logo" href="'.$home_url.'" title="'.$site_name.'">'.$site_name.'</a>'.PHP_EOL;
if ($is_homepage)
{
	echo '</h1>'.PHP_EOL;
}

// Top nav
if ( ! empty($login_url) OR ! empty($settings_url))
{
	echo '<ul id="top_nav">'.PHP_EOL;
	if ( ! empty($login_url))
	{
		$login_text = HTML::chars($login_text, FALSE);
		echo '<li><a id="tn_login" href="'.$login_url.'" title="'.$login_text.'">'.$login_text.'</a></li>'.PHP_EOL;
	}
	if ( ! empty($settings_url))
	{
		echo '<li><a id="tn_settings" href="'.$settings_url.'" title="update your settings">Settings</a></li>'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
}

// Global nav
if ( ! empty($global_nav))
{
	echo '<nav id="global_nav">'.PHP_EOL;
	echo $global_nav.PHP_EOL;
	echo '</nav>'.PHP_EOL;
}

if (isset($item_count))
{
	if (intval($item_count) > 0)
	{
		// Cart
		$wording = (intval($item_count) === 1) ? 'item' : 'items';
		echo '<div id="cart_nav">'.PHP_EOL;
		echo '<a href="'.$cart_url.'" title="checkout">'.$item_count.' '.$wording.PHP_EOL;
		if (is_numeric($item_total) AND floatval($item_total) > 0)
		{
			echo '<br /><span>'.MMI_Text::format_price($item_total, TRUE).'</span>'.PHP_EOL;
		}
		echo '</a>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
	elseif ( ! empty($discount_desc))
	{
		// Special offer
		$discount_desc = HTML::chars($discount_desc, FALSE);
		echo '<div id="offer_nav">'.PHP_EOL;
		echo '<a href="'.$products_url.'" rel="nofollow" title="'.$discount_desc.'">Special'.PHP_EOL;
		echo '<br /><em>'.$discount_desc.'</em>'.PHP_EOL;
		echo '</a>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
	}
}
else
{
	echo '<div id="updates_nav">'.PHP_EOL;
	echo '<a href="" title="... via twitter"><img src="'.URL::site('media/img/icons/wpzoom/24x24/twitter.png').'" alt="... via twitter" /></a>'.PHP_EOL;
	echo '<a href="" title="... via RSS"><img src="'.URL::site('media/img/icons/wpzoom/24x24/rss.png').'" alt="... via RSS"/></a>'.PHP_EOL;
	echo '<a href="" title="... via email"><img src="'.URL::site('media/img/icons/socialmedia/email-24x24.png').'" alt="... via email"/></a>'.PHP_EOL;
	echo '<em>receive updates:</em>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
}
