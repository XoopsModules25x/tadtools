<{if $xoBlocks.page_bottomright}>
  <{foreach item=block from=$xoBlocks.page_bottomright}>
     <{if $block.content}>
      <div class="centerBottomRightBlock">
        <{includeq file="$xoops_rootpath/modules/tadtools/themes_common/blockTitle.tpl"}>

        <div class="blockContent" style="clear:both;">
          <{$block.content}>
        </div>
      </div>
    <{/if}>
  <{/foreach}>
<{/if}>