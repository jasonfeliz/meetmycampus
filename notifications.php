<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$pageTitle = "Explore";
require_once('inc/main-header-test.php');
?>
	<div class="main-content">
		<div class="notifications-list"  id="notifications-list">
			<a href="">You have 4 New Connection Requests</a>
			<div id="notifications-request" class="modal">
	            <div class="modal-content">
	                <span class="close">&times;</span> 
	                <div class="connect-request">
	                	<h4>Requests</h4>
						<ul class="communities-list-item">
							<li class="connect-request-item">
								<a href="profile.php"><img class="connect-list-item-pic" src="https://placeimg.com/75/75/people"></a>
								<p class="connect-list-item-name">Jason Feliz</p>
								<p class="connect-list-item-info">Johnson & Wales University</p>
								<div class="event-take-action">
									<ul>
										<li>Accept</li>
										<li>Decline</li>
									</ul>
								</div>
							</li>
							<li class="connect-request-item">
								<a href="profile.php"><img class="connect-list-item-pic" src="https://placeimg.com/75/75/people"></a>
								<p class="connect-list-item-name">Jason Feliz</p>
								<p class="connect-list-item-info">Johnson & Wales University</p>
								<div class="event-take-action">
									<ul>
										<li>Accept</li>
										<li>Decline</li>
									</ul>
								</div>
							</li>	
							<li class="connect-request-item">
								<a href="profile.php"><img class="connect-list-item-pic" src="https://placeimg.com/75/75/people"></a>
								<p class="connect-list-item-name">Jason Feliz</p>
								<p class="connect-list-item-info">Johnson & Wales University</p>
								<div class="event-take-action">
									<ul>
										<li>Accept</li>
										<li>Decline</li>
									</ul>
								</div>
							</li>				
						</ul>
	                </div>
	            </div><!-- /modal-content end -->
			</div><!-- modal end -->

			<ul>
				<li>
					<a href="profile.php">
						<div class="notifications-date">Sept 19, 2017 11:41 am</div>
						<p><strong>Jerry Seinfeld</strong> is now following you</p>
					</a>				
				</li>
				<li>
					<a href="discussion.php">
						<div class="notifications-date">Sept 19, 2017 10:30 am</div>
						<p><strong>Neil Armstrong</strong> posted a discussion in <strong>Alpha Delta Psi</strong> community </p>
					</a>				
				</li>
				<li>
					<a href="event.php">
						<div class="notifications-date">Sept 19, 2017 9:26 am</div>
						<p><strong>Jason Bournes</strong> invited you to an event hosted by <strong>JWU Finance Academy</strong> community</p>
					</a>				
				</li>
				<li>
					<a href="event.php">
						<div class="notifications-date">Sept 18, 2017 8:53 pm</div>
						<p><strong>Nathan Miranda</strong> accepted your request to attend his event</p>
					</a>				
				</li>
				<li>
					<a href="event.php">
						<div class="notifications-date">Sept 18, 2017 8:53 pm</div>
						<p>you are now following <strong>Ross Geller</strong></p>
					</a>				
				</li>
				<li>
					<a href="event.php">
						<div class="notifications-date">Sept 18, 2017 8:53 pm</div>
						<p><strong>Sheldon Cooper</strong> created an event in <strong>Science & Tech @Jwu</strong> community</p>
					</a>				
				</li>
				<li>
					<a href="community.php">
						<div class="notifications-date">Sept 18, 2017 8:53 pm</div>
						<p><strong>Rachel Greene</strong> invited you to join <strong>Jwu Seniors</strong> community</p>
					</a>				
				</li>
				<li>
					<a href="discussion.php">
						<div class="notifications-date">Sept 19, 2017 10:30 am</div>
						<p><strong>Chandler Bing</strong> posted a discussion in <strong>Jwu Against Donald Trump</strong> community </p>
					</a>				
				</li>
				<li>
					<a href="community.php">
						<div class="notifications-date">Sept 19, 2017 10:30 am</div>
						<p><strong>Howard Wolowitz</strong> replied to your post "<strong>Is anyone going to game in Boston...</strong>"</p>
					</a>				
				</li>
				<li>
					<a href="community.php">
						<div class="notifications-date">Sept 19, 2017 10:30 am</div>
						<p><strong>Rajesh Koothrapali</strong> liked your post "<strong>I'm starting to feel determined to beat...</strong>"</p>
					</a>				
				</li>
			</ul>
		</div><!-- end notifications list-->
		
	</div> <!-- end main-content -->
</div>  <!-- end main body -->

<?php 
include('inc/universal-nav.php');
?>
