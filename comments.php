<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = ' commentlist';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<div id="<?php $comments->theId(); ?>" class="comment byuser comment-author-admin bypostauthor depth-<?php echo $comments->levels+1; ?> cf comment <?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <article class="cf mdui-shadow-1 mdui-hoverable">
        <header class="comment-author vcard">
            <?php $comments->gravatar('40', ''); ?>
            <cite class="fn"><?php $comments->author(); ?></cite>
        
			<time class="comment-meta">
				<a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
			</time>
        </header>
		
		<section class="comment_content cf mdui-typo" id="div-<?php $comments->theId(); ?>">
            <p><?php $comments->content(); ?></p>
        </section>

		<span class="yimik-reply-btn mdui-btn mdui-ripple">
			<?php $comments->reply('回复'); ?>
		</span>
    </article>
<?php if ($comments->children) { ?>
    
        <?php $comments->threadedComments($options); ?>

<?php } ?>
</div>
<?php } ?>



<div id="comments" class="yimik-comment-panel">
<?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>    
		<h3 id="comments-title"><span><?php $this->commentsNum('<small></small>', '<b>1</b>', '<b>%d</b>'); ?></span> 条评论</h3>	
              <section class="commentlist"><?php $comments->listComments(array('before' =>  '','after'  =>  '')); ?></section>
			<nav class="pagination">
				<ul class="page-numbers">
					<?php $comments->pageNav('←','→','2','...'); ?>
				</ul>
			</nav>	  
    <?php endif; ?>
	
	<?php if($this->allow('comment')): ?>
	<div id="<?php $this->respondId(); ?>" class="yimik-comment-panel-respond mdui-shadow-1 mdui-hoverable">
        <script type="text/javascript" language="javascript">
			function grin(tag) {
			var myField;
			tag = ' ' + tag + ' ';
			if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
				myField = document.getElementById('comment');
			} else {
				return false;
			}
			if (document.selection) {
				myField.focus();
				sel = document.selection.createRange();
				sel.text = tag;
				myField.focus();
			}
			else if (myField.selectionStart || myField.selectionStart == '0') {
				var startPos = myField.selectionStart;
				var endPos = myField.selectionEnd;
				var cursorPos = endPos;
				myField.value = myField.value.substring(0, startPos)
					+ tag
					+ myField.value.substring(endPos, myField.value.length);
				cursorPos += tag.length;
				myField.focus();
				myField.selectionStart = cursorPos;
				myField.selectionEnd = cursorPos;
			}
			else {
				myField.value += tag;
				myField.focus();
			}
		}
		</script>

		<div id="respond" class="comment-respond">
			<h3 id="reply-title" class="comment-reply-title">发表评论 <small><?php $comments->cancelReply('取消回复'); ?></small></h3>			
			<form action="<?php $this->commentUrl() ?>" method="post" id="commentform" class="comment-form" novalidate="">
			
			<?php if($this->user->hasLogin()): ?>
			<p class="logged-in-as"><a href="<?php $this->options->profileUrl(); ?>" aria-label="已登入为<?php $this->author->screenName(); ?>。编辑您的个人资料。">已登入为<?php $this->author->screenName(); ?></a>。<a href="<?php $this->options->logoutUrl(); ?>">登出？</a></p>
			
			<p class="comment-form-comment">
				<label for="comment">评论</label> 
				<textarea id="comment" name="text" cols="45" rows="8" maxlength="65525" required="required"></textarea>
			</p>
			
			<!--<p class="yimik-comment-smiles">
				<a href="javascript:grin(';-)')"><img draggable="false" class="emoji" alt="😉" src="https://s.w.org/images/core/emoji/11/svg/1f609.svg"></a><a href="javascript:grin(':|')"><img draggable="false" class="emoji" alt="😐" src="https://s.w.org/images/core/emoji/11/svg/1f610.svg"></a><a href="javascript:grin(':x')"><img draggable="false" class="emoji" alt="😡" src="https://s.w.org/images/core/emoji/11/svg/1f621.svg"></a><a href="javascript:grin(':twisted:')"><img draggable="false" class="emoji" alt="😈" src="https://s.w.org/images/core/emoji/11/svg/1f608.svg"></a><a href="javascript:grin(':smile:')"><img draggable="false" class="emoji" alt="🙂" src="https://s.w.org/images/core/emoji/11/svg/1f642.svg"></a><a href="javascript:grin(':shock:')"><img draggable="false" class="emoji" alt="😯" src="https://s.w.org/images/core/emoji/11/svg/1f62f.svg"></a><a href="javascript:grin(':sad:')"><img draggable="false" class="emoji" alt="🙁" src="https://s.w.org/images/core/emoji/11/svg/1f641.svg"></a><a href="javascript:grin(':roll:')"><img draggable="false" class="emoji" alt="🙄" src="https://s.w.org/images/core/emoji/11/svg/1f644.svg"></a><a href="javascript:grin(':razz:')"><img draggable="false" class="emoji" alt="😛" src="https://s.w.org/images/core/emoji/11/svg/1f61b.svg"></a><a href="javascript:grin(':oops:')"><img draggable="false" class="emoji" alt="😳" src="https://s.w.org/images/core/emoji/11/svg/1f633.svg"></a><a href="javascript:grin(':o')"><img draggable="false" class="emoji" alt="😮" src="https://s.w.org/images/core/emoji/11/svg/1f62e.svg"></a><a href="javascript:grin(':mrgreen:')"><img src="https://wp.xu.ci/wp-includes/images/smilies/mrgreen.png" alt=":mrgreen:" class="wp-smiley" style="height: 1em; max-height: 1em;"></a><a href="javascript:grin(':lol:')"><img draggable="false" class="emoji" alt="😆" src="https://s.w.org/images/core/emoji/11/svg/1f606.svg"></a><a href="javascript:grin(':idea:')"><img draggable="false" class="emoji" alt="💡" src="https://s.w.org/images/core/emoji/11/svg/1f4a1.svg"></a><a href="javascript:grin(':grin:')"><img draggable="false" class="emoji" alt="😀" src="https://s.w.org/images/core/emoji/11/svg/1f600.svg"></a><a href="javascript:grin(':evil:')"><img draggable="false" class="emoji" alt="👿" src="https://s.w.org/images/core/emoji/11/svg/1f47f.svg"></a><a href="javascript:grin(':cry:')"><img draggable="false" class="emoji" alt="😥" src="https://s.w.org/images/core/emoji/11/svg/1f625.svg"></a><a href="javascript:grin(':cool:')"><img draggable="false" class="emoji" alt="😎" src="https://s.w.org/images/core/emoji/11/svg/1f60e.svg"></a><a href="javascript:grin(':arrow:')"><img draggable="false" class="emoji" alt="➡" src="https://s.w.org/images/core/emoji/11/svg/27a1.svg"></a><a href="javascript:grin(':???:')"><img draggable="false" class="emoji" alt="😕" src="https://s.w.org/images/core/emoji/11/svg/1f615.svg"></a><a href="javascript:grin(':?:')"><img draggable="false" class="emoji" alt="❓" src="https://s.w.org/images/core/emoji/11/svg/2753.svg"></a><a href="javascript:grin(':!:')"><img draggable="false" class="emoji" alt="❗" src="https://s.w.org/images/core/emoji/11/svg/2757.svg"></a>
			</p>-->
			<?php else: ?>
			<p class="comment-notes">
				<span id="email-notes">电子邮件地址不会被公开。</span> 必填项已用<span class="required">*</span>标注
			</p>
					
			<p class="comment-form-comment">
				<label for="comment">评论</label> 
				<textarea id="comment" name="text" cols="45" rows="8" maxlength="65525" required="required"></textarea>
			</p>
			
				
			<p class="comment-form-author"><label for="author">姓名 <span class="required">*</span></label> <input id="author" name="author" type="text" value="<?php $this->remember('author'); ?>" size="30" maxlength="245" required="required"></p>
			<p class="comment-form-email"><label for="email">电子邮件 <span class="required">*</span></label> <input id="mail" name="mail" type="email" value="<?php $this->remember('mail'); ?>" size="30" maxlength="100" aria-describedby="email-notes" required="required"></p>
			<p class="comment-form-url"><label for="url">站点</label> <input id="url" name="url" type="url" value="<?php $this->remember('url'); ?>" size="30" maxlength="200"></p>
			
			<?php endif; ?>
			<p class="form-submit">
				<button name="submit" type="submit" id="submit" class="mdui-btn mdui-ripple">发表评论</button> 
			</p>
				<?php $security = $this->widget('Widget_Security'); ?>
				<input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">
			</form>
		</div><!-- #respond -->		
		
	
	</div>
	<?php endif; ?>
</div>

