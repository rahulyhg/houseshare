<h3>My account - Welcome {{Auth::user()->first_name}}</h3>
Your account is a basic account
<hr/>
<h4>Benefits of upgrading:</h4>

<div class="col-md-6">
	<div class="candidate flex no-wrap no-column">
		<div class="candidate-image">
			{{HTML::image('img/candidate01.jpg','candidate-image',array('class'=>'img-responsive'))}}
		</div>
		<div class="candidate-info">
			<h4 class="candidate-name">A Bold Ad</h4>
			<a href="javascript:;"><h5 class="candidate-designation">See example</h5></a>
			<p class="candidate-description ultra-light">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			</p>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="candidate flex no-wrap no-column">
		<div class="candidate-image">
			{{HTML::image('img/candidate02.jpg','candidate-image',array('class'=>'img-responsive'))}}
		</div>
		<div class="candidate-info">
			<h4 class="candidate-name">Early Bird Access</h4>
			<p class="candidate-description ultra-light">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			</p>
			<div class="candidate-info-bottom flex no-column items-center">
				<ul class="list-unstyled candidate-skills flex no-column items-center">
					<li><a href="javascript:;" class="button">Upgrade now</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>