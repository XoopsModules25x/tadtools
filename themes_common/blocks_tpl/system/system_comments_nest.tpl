<{section name=i loop=$comments}>
    <br/>
    <table class="table table-bordered">
        <{includeq file="$xoops_rootpath/modules/tadtools/themes_common/blocks_tpl/system/system_comment.tpl" comment=$comments[i]}>
    </table>

    <!-- start comment replies -->
    <{foreach item=reply from=$comments[i].replies}>
        <br/>

        <table class="table table-bordered" style="margin-left:<{$reply.prefix}>px;">
            <tr>
                <th><{$lang_poster}></th>
                <th><{$lang_thread}></th>
            </tr>
            <{includeq file="$xoops_rootpath/modules/tadtools/themes_common/blocks_tpl/system/system_comment.tpl" comment=$reply}>
        </table>
    <{/foreach}>
    <!-- end comment tree -->
<{/section}>

<{if $commentform}>
    <div class="commentform"><{$commentform}></div><{/if}>
