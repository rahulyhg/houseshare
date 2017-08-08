<?php /*
	<div class="search-widget blog-widget">
	<h6>Search this site</h6>
	<div class="input-group search-form">
	<input type="text" class="form-control"  placeholder="Enter your keyword" >
	<button type="submit"><span><i class="ion-ios-search"></i></span></button>
	</div>
</div> */ ?>

<!-- end .search-widget -->
<?php /*
	<div class="recent-posts-widget blog-widget">
	<h6>Recent Posts</h6>
	<div class="recent-post flex items-center no-column no-wrap">
	<img src="images/recent-post01.jpg" alt="recent-post-img" class="img-responsive">
	<h4><a href="#0">Tips to write an impressive resume online for beginner</a></h4>
	</div>
	<!-- end .recent-post -->
	<div class="recent-post flex items-center no-column no-wrap">
	<img src="images/recent-post02.jpg" alt="recent-post-img" class="img-responsive">
	<h4><a href="#0">The secret to pitching for new business</a></h4>
	</div>
	<!-- end .recent-post -->
	<div class="recent-post flex items-center no-column no-wrap">
	<img src="images/recent-post03.jpg" alt="recent-post-img" class="img-responsive">
	<h4><a href="#0">7 things you should never say to your boss</a></h4>
	</div>
	<!-- end .recent-post -->
</div> */ ?>

<!-- end .recent-posts-widget -->
<div class="blog-category-widget blog-widget">
	<h6>Categories</h6><?php 
	$blog_category = GeneralHelper::getblogCategory(); ?>
	<ul class="blog-categories list-unstyled">
		@if(!empty($blog_category))
		@foreach($blog_category as $blog_category_val) 
		<li><a href="{{URL::to('blogs/'.$blog_category_val->id)}}">{{$blog_category_val->name}} ({{$blog_category_val->blog_category_count}})</a></li>
		@endforeach	
		@endif 
	</ul>
</div>

<?php 
	/*
		<!-- end .blog-category-widget -->
		<div class="blog-tags-widget blog-widget">
		<h6>Tags</h6>
		<ul class="blog-tags flex no-column list-unstyled">
		<li><a href="#0" class="button button-xs grey">Jobpress</a></li>
		<li><a href="#0" class="button button-xs grey">Recruiter</a></li>
		<li><a href="#0" class="button button-xs grey">Interview</a></li>
		<li><a href="#0" class="button button-xs grey">Employee</a></li>
		<li><a href="#0" class="button button-xs grey">Labor</a></li>
		<li><a href="#0" class="button button-xs grey">HR</a></li>
		<li><a href="#0" class="button button-xs grey">Freelancer</a></li>
		<li><a href="#0" class="button button-xs grey">Slaray</a></li>
		<li><a href="#0" class="button button-xs grey">Employer</a></li>
		</ul>
		</div>
		<!-- end .blog-tags-widget -->
		<div class="blog-archives-widget blog-widget">
		<h6>Arhives</h6>
		<ul class="blog-archives list-unstyled">
		<li><a href="#">October 2017<span>28 posts</span></a></li>
		<li><a href="#">September 2017<span>35 posts</span></a></li>
		<li><a href="#">August 2017<span>19 posts</span></a></li>
		<li><a href="#">July 2017<span>23 posts</span></a></li>
		<li><a href="#">June 2017<span>29 posts</span></a></li>
		<li><a href="#">May 2017<span>16 posts</span></a></li>
		<li><a href="#">April<span>14 posts</span></a></li>
		</ul>
		</div>
	*/ ?>	