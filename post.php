<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="container">
	<div id="content">

		<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope="" itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<!--面包屑导航-->
				<div itemscope="" itemtype="http://schema.org/WebPage" class="breadcrumbs mdui-shadow-1 mdui-hoverable"> 
				<a href="<?php $this->options ->siteUrl(); ?>">主页</a> &raquo; <?php $this->category(','); ?> &raquo; <a href="<?php $this->permalink(); ?>"><?php $this->title() ?></a>
				</div>						
				
	<article id="post-129" class="cf yimik-article mdui-shadow-1 mdui-hoverable post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-7 tag-14" role="article" itemscope="" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

		<header class="article-header entry-header">

			<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php $this->title() ?></h1>

			<p class="byline entry-meta vcard">
				<a class="yimik-chip mdui-ripple mdui-hoverable">
					<span class="yimik-chip-icon"><i class="fa fa-comments-o"></i></span>
					<span class="yimik-chip-title">
							<span><?php $this->commentsNum('暂无', '1条', '%d条'); ?></span>评论                    </span>
				</a>
				<a class="yimik-chip mdui-ripple mdui-hoverable">
					<span class="yimik-chip-icon"><i class="fa fa-clock-o"></i></span>
					<span class="yimik-chip-title">
						<?php $this->date('Y-m-d'); ?> </span>
				</a>
				<a class="yimik-chip mdui-ripple mdui-hoverable">
					<span class="yimik-chip-icon"><i class="fa fa-user"></i></span>
					<span class="yimik-chip-title">
							<?php $this->author(); ?> </span>
				</a>

			</p>

		</header> 

		<section class="entry-content cf mdui-typo" itemprop="articleBody">
		<?php parseContent($this); ?>
		</section> 
		
		<footer class="article-footer">

			<p class="tags"><i class="mdui-icon material-icons"></i><span class="tags-title">标签：<?php $this->tags('  ', true, '<a>没有标签</a>'); ?></span></p>
			<!--share plugin-->
			
		</footer> 
	</article> 

	<nav class="navigation post-navigation mdui-shadow-1 mdui-hoverable" role="navigation">
		<h2 class="screen-reader-text">文章版权所有，转载请注明出处!</h2>
		<div class="nav-links">
		<div class="nav-previous"><span class="screen-reader-text">上一篇 : </span> <span class="post-title"><?php $this->thePrev(); ?></span></div>
		<div class="nav-next"><span class="screen-reader-text">下一篇 : </span> <span class="post-title"><?php $this->theNext(); ?></span></div>
		</div>
	</nav>

	<?php $this->need('comments.php'); ?>					
						
	</main>

	<?php $this->need('sidebar.php'); ?>

		</div>

	</div>
</div>
	<?php $this->need('footer.php'); ?>		
			
	



