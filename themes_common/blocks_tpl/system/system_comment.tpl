<!-- start comment post -->
<tr>
    <td class="head">
        <a id="comment<{$comment.id}>"></a> <{$comment.poster.uname}>
    </td>
    <td class="head">
        <div class="comDate">
            <span class="comDateCaption"><{$lang_posted}>:</span> <{$comment.date_posted}>&nbsp;&nbsp;
            <span class="comDateCaption"><{$lang_updated}>:</span>
            <{$comment.date_modified}>
        </div>
    </td>
</tr>


<tr>

    <{if $comment.poster.id != 0}>
        <td class="odd" style="width: 200px;">
            <div class="comUserRank">
                <div class="comUserRankText"><{$comment.poster.rank_title}></div>
                <img class="comUserRankImg" src="<{$xoops_upload_url}>/<{$comment.poster.rank_image}>" alt="<{$comment.poster.rank_title}>">
            </div>
            <img class="img-responsive img-rounded" src="<{$xoops_upload_url}>/<{$comment.poster.avatar}>" alt="<{$comment.poster.rank_title}>">

            <div class="comUserStat"><span class="comUserStatCaption"><{$lang_joined}>:</span> <{$comment.poster.regdate}></div>
            <div class="comUserStat"><span class="comUserStatCaption"><{$lang_from}>:</span> <{$comment.poster.from}></div>
            <div class="comUserStat"><span class="comUserStatCaption"><{$lang_posts}>:</span> <{$comment.poster.postnum}></div>
            <div class="comUserStatus"><{$comment.poster.status}></div>
        </td>
    <{else}>
        <td class="odd"></td>
    <{/if}>

    <td class="odd">
        <div><{$comment.image}><{$comment.title}></div>
        <div><{$comment.text}></div>
    </td>
</tr>

<tr>
    <td class="even"></td>

    <{if $xoops_iscommentadmin == true}>
        <td class="even txtright">
            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_edit}>"><img src="<{$xoops_url}>/images/icons/edit.gif"
                                                                                                   alt="<{$lang_edit}>"/></a>
            <a href="<{$deletecomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_delete}>"><img src="<{$xoops_url}>/images/icons/delete.gif"
                                                                                                       alt="<{$lang_delete}>"/></a>
            <a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_reply}>"><img src="<{$xoops_url}>/images/icons/reply.gif"
                                                                                                     alt="<{$lang_reply}>"/></a>
        </td>
    <{elseif $xoops_isuser == true && $xoops_userid == $comment.poster.id}>
        <td class="even txtright">
            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_edit}>"><img src="<{$xoops_url}>/images/icons/edit.gif"
                                                                                                   alt="<{$lang_edit}>"/></a>
            <a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>" title="<{$lang_reply}>"><img src="<{$xoops_url}>/images/icons/reply.gif"
                                                                                                     alt="<{$lang_reply}>"/></a>
        </td>
    <{elseif $xoops_isuser == true || $anon_canpost == true}>
        <td class="even txtright">
            <a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>"/></a>
        </td>
    <{else}>
        <td class="even"></td>
    <{/if}>

</tr>
<!-- end comment post -->
