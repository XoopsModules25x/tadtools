<link rel="stylesheet" type="text/css" href="<{xoAppUrl modules/tadtools/themes3_tpl/menu/superfish/css/superfish.css}>" />
<{if $vertical}>
<link rel="stylesheet" type="text/css" href="<{xoAppUrl modules/tadtools/themes3_tpl/menu/superfish/css/superfish-vertical.css}>" />
<{/if}>

<style type="text/css">
  .sf-menu a {
    color: <{$navbar_color}>;
  }
  .sf-menu li {
    background-color: <{$navbar_bg_top}>;
  }
  .sf-menu ul li {
    background-color: <{$navbar_bg_bottom}>;
  }
  .sf-menu ul ul li {
    background-color: <{$navbar_bg_bottom}>;
  }
  .sf-menu li:hover,.sf-menu li.sfHover {
    background-color: <{$navbar_hover}>;
    color: <{$navbar_color_hover}>;
  }
</style>
<script type="text/javascript" src="<{xoAppUrl modules/tadtools/themes3_tpl/menu/superfish/js/hoverIntent.js}>"></script>
<script type="text/javascript" src="<{xoAppUrl modules/tadtools/themes3_tpl/menu/superfish/js/superfish.js}>"></script>
<script type="text/javascript">

$(document).ready(function(){
  $("ul.sf-menu").superfish({
      delay:       500,                            // one second delay on mouseout
      animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
      speed:       'fast',                          // faster animation speed
      disableHI:   true,
      autoArrows:  true,                           // disable generation of arrow mark-up
      dropShadows: true                            // disable drop shadows
  });
});

</script>

<ul class="sf-menu<{if $vertical}> sf-vertical<{/if}>" id="tad_sf_menu">
  <{foreach from=$menu_var item=menu}>
    <li>
      <a href='<{$menu.url}>' target="<{$menu.target}>">
        <span><{if $menu.icon}><span class="fa <{$menu.icon}>" <{$navbar_icon}>></span> <{/if}><{$menu.title}></span>
      </a>
      <{if $menu.submenu}>
        <ul>
          <{foreach from=$menu.submenu item=menu2}>
            <li>
              <a href='<{$menu2.url}>' target="<{$menu2.target}>">
                <span><{if $menu2.icon}><span class="fa <{$menu2.icon}>"></span> <{/if}><{$menu2.title}></span>
              </a>
              <{if $menu2.submenu}>
                <ul>
                  <{foreach from=$menu2.submenu item=menu3}>
                    <li>
                      <a href='<{$menu3.url}>' target="<{$menu3.target}>">
                        <span><{if $menu3.icon}><span class="fa <{$menu3.icon}>"></span> <{/if}><{$menu3.title}></span>
                      </a>
                    </li>
                   <{/foreach}>
                </ul>
              <{/if}>
            </li>
           <{/foreach}>
        </ul>
      <{/if}>
    </li>
   <{/foreach}>
</ul>

