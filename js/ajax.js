function ajaxRequest(){
			try { 
				var request = new XMLHttpRequest() 
			} catch(e1) {
				 try { 
				    request = new ActiveXObject("Msxml2.XMLHTTP") 
				} catch(e2) {
					try { 
					   	request = new ActiveXObject("Microsoft.XMLHTTP") 
					} catch(e3) {
				     	request = false
				      } 
				}
			} 
			return request
	}

	function showReviews(collegeName,category){
		var params = 'school_name=' + collegeName + '&review_category='+category
		request = new ajaxRequest()
		request.open("GET", "show_ajax.php?"+params, true)

		request.onreadystatechange = function(){
			if (this.readyState == 4){
				if (this.status == 200){
				    if (this.responseText != null){
				        $('#review-item').html(this.responseText)
				    }else alert("Ajax error: No data received")
				}else alert( "Ajax error: " + this.statusText)
			}
		}
		request.send()
	}
	function showReviewsRatings(collegeName,rating){
		var params = 'school_name=' + collegeName + '&review_rating='+rating
		request = new ajaxRequest()
		request.open("GET", "show_ajax.php?"+params, true)

		request.onreadystatechange = function(){
			if (this.readyState == 4){
				if (this.status == 200){
				    if (this.responseText != null){
				        $('#review-item').html(this.responseText)
				    }else alert("Ajax error: No data received")
				}else alert( "Ajax error: " + this.statusText)
			}
		}
		request.send()
	}
	function showCommunityPost(collegeName,communityId,communityPost){
		var params = 'school_name=' + collegeName + '&community_id=' + communityId + '&community_post=' + communityPost
		request = new ajaxRequest()
		request.open("GET", "show_ajax.php?"+params, true)

		request.onreadystatechange = function(){
			if (this.readyState == 4){
				if (this.status == 200){
				    if (this.responseText != null){
				        $('#forum-list').html(this.responseText)
				    }else alert("Ajax error: No data received")
				}else alert( "Ajax error: " + this.statusText)
			}
		}
		request.send()
	}


function showEventType(collegeName,eventType){
        var event = $(eventType).attr('id');
        params =  "school_name=" + collegeName + "&e_type=" + event;
        request = new ajaxRequest()
        request.open("GET", "show_ajax.php?"+params, true)

		request.onreadystatechange = function(){
			if (this.readyState == 4){
				if (this.status == 200){
				    if (this.responseText != null){
				        $('#show-event').html(this.responseText)
				    }else alert("Ajax error: No data received")
				}else alert( "Ajax error: " + this.statusText)
			}
		}
		request.send()
}
function showDiscussionRoom(collegeName,discussionRoom){
        var dRoom = $(discussionRoom).attr('id');
        params =  "school_name=" + collegeName + "&d_room=" + dRoom;
        request = new ajaxRequest()
        request.open("GET", "show_ajax.php?"+params, true)

		request.onreadystatechange = function(){
			if (this.readyState == 4){
				if (this.status == 200){
				    if (this.responseText != null){
				        $('#show-room').html(this.responseText)
				    }else alert("Ajax error: No data received")
				}else alert( "Ajax error: " + this.statusText)
			}
		}
		request.send()

}

function showFavoriteType(id){
       var favId = $(id).attr('id');
 	$.ajax({
	     type: "POST",
	     url: 'show_ajax_favorites.php',
	     data: {'fav_type': favId},
	     success: function(result) {
	     	$('#fav-list').html(result);
	     }
	});
}

function addEventComment(){
	$.ajax({
	     type: "POST",
	     url: 'procedures/doAddComment.php',
	     data: $("#add-event-comment").serialize(),
	     success: function(data) {
	     	$('#first-event-comment').fadeOut();
	         $('#event-comments-list').append(data);
	         $('.comment-list-item:last').hide().fadeIn(1000);
	         $('input[name="add-event-comment"]').blur().val('');
	     }
	});
}
function addReply(collegeUrl,discussionId){
	$.ajax({
	     type: "POST",
	     url: 'procedures/doAddReply.php?school_name='+collegeUrl,
	     data: $("#reply-form").serialize() + '&discussion-id='+discussionId + '&discussion-title='+ $('.discussion-reply-list-item > h4').html(),
	     success: function(data) {
	     	console.log(data)
	     	 $('#createCommunityModal').hide();
	         $('#show-replies').prepend(data);
	         $('li.forum-item:first').hide().fadeIn(1500);
	         $('li.forum-item:first').css("border", "solid 3px #DF7367");

	     }
	});
}
function addReplyCommunity(collegeUrl,communityId,discussionId){
	var id = '#' + $(id).attr('id');
	$.ajax({
	     type: "POST",
	     url: 'procedures/doAddReply.php?school_name='+collegeUrl,
	     data: $("#reply-form").serialize() + '&discussion-id='+discussionId+ '&community-id='+communityId,
	     success: function(data) {
	     	 $('#createCommunityModal').hide();
	         $('#show-replies').prepend(data);
	         $('li.forum-item:first').hide().fadeIn(1500);
	         $('li.forum-item:first').css("border", "solid 3px #DF7367");
	     }
	});
}

function addReplyComment(id){

	$.ajax({
	     type: "POST",
	     url: 'procedures/doAddReplyComment.php',
	     data: $("#add-reply-comment-"+id).serialize(),
	     success: function(data) {
	         $('#discussion-reply-list-'+id).append(data);
	         $('#discussion-reply-list-'+id +' > .discussion-reply-list-item:last').hide().fadeIn(1000);
	         $('input[name="r-reply-post"], input[name="community-r-reply-post"]').blur().val('');
	     }
	});
}
function browseByTopic(collegeName, topicId){
	$.ajax({
	     type: "GET",
	     url: 'show_ajax.php',
	     data: {'discussion_topic_id': topicId, 'collegeName':collegeName},
	     success: function(result) {
	     	$('#discussion-list').html(result);
	     }
	});
}

function doFavorites(favoriteType, typeId, userId, id){
	var id = '#' + $(id).attr('id');
	// console.log(id);
	$.ajax({
	     type: "POST",
	     url: 'procedures/doAddFavorites.php',
	     data: {'typeId': typeId, 'userId':userId, 'favoriteType':favoriteType},
	     success: function(result) {
	     	if (result == "add") {
	     		$(id).css('color', '#DF7367');
	     	}else if(result == "delete"){
	     		$(id).css('color', 'rgba(0,0,0,.5)');
	     	}else if (result == "fail" || result == "empty"){
	     		console.log('fail');
	     	}
	     }
	});
}


function followSchool(userId,collegeId,id){
	var id = '#' + $(id).attr('id');
	// console.log(id);
	$.ajax({
	     type: "POST",
	     url: 'procedures/doFollowSchool.php',
	     data: {'user-id': userId, 'college-id':collegeId},
	     success: function(result) {
	     	if (result == "follow") {
	     		$(id).html("Unfollow School");
	     	}else if(result == "unfollow"){
	     		$(id).html("+ Follow School");
	     	}else{
	     		console.log('fail')
	     	}
	     }
	});
}
function addInterest(userId,categoryId,id){
	var id = '#' + $(id).attr('id');
	if (userId == 0) {
		return;
	}else{
		$.ajax({
		     type: "POST",
		     url: 'procedures/doAddInterest.php',
		     data: {'user-id': userId, 'category-id':categoryId},
		     success: function(result) {
		     	if (result == "follow") {
		     		$(id).html("Unfollow");
		     	}else if(result == "unfollow"){
		     		$(id).html("Follow");
		     	}
		     }
		});		
	}

}
function joinCommunity(communityId ,userId,collegeUrl,status){
	// console.log(id);
	if (status === 1) {
		$.ajax({
		     type: "POST",
		     url: 'procedures/doJoinCommunity.php?school_name='+collegeUrl,
		     data: {'community-id': communityId, 'user-id':userId},
		     success: function(result) {
		     	if (result == "leave-pending" || result == "cancel-pending-request") {
		     		$('#confirm-community').fadeIn(250);
		     		if (result== "leave-pending") {
		     			$('#confirm-message').text('Are you sure you want to leave this community?')
		     		}else{
		     			$('#confirm-message').text('Are you sure you want to cancel your pending request to join this community?');
		     		};
		     	}else if(result == "joined" || result == "join-pending"){
		     		$('#confirm-community').fadeIn(250);
		     		$('.modalButtons').css('width','100%');
		     		$('#confirmButton').css('display','none');
		     		if(result == "joined"){
		     			$('#confirm-message').text('Awesome, you just joined this community!');
		     		}else{
		     			$('#confirm-message').text('Your request to join this private community is pending.');
		     		}
		     		$('#closeModal, #confirm-community span.close').click(function(){
		     			location.reload();
		     		})
					$(window).click(function(e){
					    if (e.target.id == 'confirm-community') {
					         location.reload();
					    }
					});
		     	}else{
		     		console.log('nada');
		     	}
		     }
		});
	}else if(status === 2){
		$.ajax({
		     type: "POST",
		     url: 'procedures/doJoinCommunity.php',
		     data: {'community-id': communityId, 'user-id':userId, 'leave':'post-leave'},
		     success: function(result) {
		     	if (result == "leave-confirmed") {
		     		location.reload();
		     	}
		     }
		});		
	}

}

function attendEvent(eventId,collegeUrl,id){
	var icon = $('#event-action > i');
	var div = $('#event-action > div');
	// console.log(id);
		$.ajax({
		     type: "POST",
		     url: 'procedures/doAttendEvent.php?school_name='+collegeUrl,
		     data: {'event-id': eventId},
		     success: function(result) {
		     	if (result == "leave-event") {
		     		$(id).css('background','#fff');
		     		icon.css('color','rgba(0,0,0,.3)')
		     		div.html('I want to attend')
		     	}else if(result == "attending"){
		     		$(id).css('background','aliceblue');
		     		icon.css('color','rgb(118, 214, 108)')
		     		div.html('I am attending')
		     	}else{
		     		div.html(result);
		     	}
		     }
		});


}

function vote(discussionId,userId,id){
	var id = $(id).attr('id');
	var count =  Number($('#vote-count-'+discussionId).html());
	if (userId === 0) {
		$('#discussion-forum-item-'+discussionId).append("<p class='login-message'>You must be logged in to vote</p>");
		setTimeout(loginMessage, 3000);
		function loginMessage(){
			$('#discussion-forum-item-'+discussionId+' .login-message').fadeOut(1000);
		}
	}else{
		$.ajax({
		     type: "POST",
		     url: 'procedures/doVote.php',
		     data: {'discussion-id': discussionId, 'user-id':userId,'action':id},
		     success: function(result) {
		     	if (result == "already-voted") {
		     		$('#vote-count').html(count);
		     		console.log(result);
		     	}else if(result == "add-upvote"){
		     		newCount = count + 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);
		     	}else if(result == "clear-upvote"){
		     		newCount = count + 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#downvote-'+discussionId).removeClass('active-vote')
		     		console.log(result);			     		
		     	}else if(result == "add-downvote"){
		     		newCount = count - 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);	     		
		     	}else if(result == "clear-downvote"){
		     		newCount = count - 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#upvote-'+discussionId).removeClass('active-vote')
		     		console.log(result);	     		
		     	}else if(result == "new-upvote"){
		     		newCount = count + 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);		     		
		     	}else if(result == "new-downvote"){
		     		newCount = count - 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);	     		
		     	}else{
		     		
		     	}
		     }
		});	
	}

}

function c_vote(discussionId,userId,id){
	var id = $(id).attr('id');
	var count =  Number($('#vote-count-'+discussionId).html());
	if (userId === 0) {
		$('#c-discussion-forum-item-'+discussionId).append("<p class='login-message'>You must be logged in to vote</p>");
		setTimeout(loginMessage, 3000);
		function loginMessage(){
			$('#c-discussion-forum-item-'+discussionId+' .login-message').fadeOut(1000);
		}
	}else{
		$.ajax({
		     type: "POST",
		     url: 'procedures/doCVote.php',
		     data: {'discussion-id': discussionId, 'user-id':userId,'action':id},
		     success: function(result) {
		     	if (result == "already-voted") {
		     		$('#vote-count').html(count);
		     		console.log(result);
		     	}else if(result == "add-upvote"){
		     		newCount = count + 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);
		     	}else if(result == "clear-upvote"){
		     		newCount = count + 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#downvote-'+discussionId).removeClass('active-vote')
		     		console.log(result);			     		
		     	}else if(result == "add-downvote"){
		     		newCount = count - 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);	     		
		     	}else if(result == "clear-downvote"){
		     		newCount = count - 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#upvote-'+discussionId).removeClass('active-vote')
		     		console.log(result);	     		
		     	}else if(result == "new-upvote"){
		     		newCount = count + 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);		     		
		     	}else if(result == "new-downvote"){
		     		newCount = count - 1
		     		$('#vote-count-'+discussionId).html(newCount);
		     		$('#'+id).addClass('active-vote')
		     		console.log(result);	     		
		     	}else{
		     		
		     	}
		     }
		});		
	}

}

function showEllipsis(eId){
	var ellipsisId = '#' + $(eId).attr('id');
	var ellipsisMenu = $(ellipsisId).next();
	var currentDisplay = ellipsisMenu.css('display');

	if (currentDisplay == 'none') {
		$(ellipsisMenu).fadeIn(100);
	}else{
		$(ellipsisMenu).fadeOut(100);
	}

	$(window).click(function(e){
	    if (e.target.id != $(eId).attr('id') && e.target.className != 'ellipsis-button') {
	         $(ellipsisMenu).fadeOut(250);
	    }
	});
}

function removeItem(type,typeId,param){
		if (typeof param === "undefined" || param === null) {
			$('#confirm-modal').fadeIn();
			$('#confirm-message2').text('Are you sure you want to remove this?')
			$('#confirmModalButton').attr('onClick',"removeItem('"+type+"',"+typeId+",'yes')")
		}else{
			$.ajax({
			    type: "POST",
			    url: 'procedures/doRemoveItem.php',
			    data: {'type': type, 'type-id':typeId},
			    success: function(result) {
			     	if(result == "success"){
			     		if (type == 'community' || type == 'event') {
			     			window.history.back();
			     		}else{
			     			location.reload();
			     		}
			     		
			     	}else{
			     		console.log(result)
			     	}
			   }
			});			
		}
}

function updateProfile(){
		$('#redirect-modal').fadeIn(200);
		$('#confirm-message3').text("Are you sure you want to save these changes to your account? ")
			$('<input>').attr({
				type: 'hidden',
			    name: 'profile',
			    value: 'true'
			}).prependTo('#form');
		var data = $('#ud-profile').serialize();
		var splitData = data.split('&');
		$.each(splitData, function(i,e){
			var vals = e.split('=');
			$('<input>').attr({
				type: 'hidden',
			    name: vals[0],
			    value: vals[1]
			}).prependTo('#form');
		})
}


function deleteAccount(){
		$('#redirect-modal').fadeIn(200);
		$('#confirm-message3').text("Are you sure you want to delete your account? ");
			$('<input>').attr({
				type: 'hidden',
			    name: 'delete_account',
			    value: 'true'
			}).prependTo('#form');
}

function followMembers(userId,friendId,id){
	var id = '#' + $(id).attr('id');
	$.ajax({
	     type: "POST",
	     url: 'procedures/doFollowMembers.php',
	     data: {'user-id': userId, 'friend-id':friendId},
	     success: function(result) {
	     	if (result == "follow") {
	     		$(id).html("Unfollow");
	     	}else if(result == "unfollow"){
	     		$(id).html("+ Follow");
	     	}else{
	     		console.log(result)
	     	}
	     }
	});
}

function communityRequest(action,profileId,communityId){
	var listId ='#request-'+profileId;
	var userName = $(listId+' .connect-list-item-name').text();

	$.ajax({
	     type: "POST",
	     url: 'procedures/doCommunityRequest.php',
	     data: {'action': action, 'profile_id':profileId, 'id':communityId},
	     success: function(result) {
	     	if (result == "accept") {
	     		$(listId).html("<div style='display:inline-block;'>You have accepted <strong style='color:#DF7367'> " + userName + "'s</strong> "+" request to join your community</div>")
	     	}else if(result == "decline"){
	     		$(listId).html("<div style='display:inline-block;'>You have declined <strong style='color:#DF7367'> " + userName + "'s</strong> "+" request to join your community</div>")
	     	}

	     }
	});
}

function search_community(term,collegeId,collegeName){
	if (term.length >= 2) {
		$.ajax({
		     type: "GET",
		     url: 'procedures/doSearch.php',
		     data: {'search_community': term,'college_id':collegeId,'college_name':collegeName},
		     success: function(result) {
		     	$('#search_results_c').html(result)

		     }
		});		
	}else if(term.length < 1){
		$('#search_results_c').html('')
	}

}

function search_discussion(term,collegeId,collegeName){
	if (term.length >= 2) {
		$.ajax({
		     type: "GET",
		     url: 'procedures/doSearch.php',
		     data: {'search_discussion': term,'college_id':collegeId,'college_name':collegeName},
		     success: function(result) {
		     	$('#search_results_d').html(result)

		     }
		});		
	}else if(term.length < 1){
		$('#search_results_d').html('')
	}

}



$('#reportYes').click(function(){
    var _type = $(this).data('type');
    var _id = $(this).data('id');
	$.ajax({
		type: "POST",
		url: 'procedures/doReportContent.php',
		data: {'type':_type,'id':_id},
		success: function(result) {

			if (result == 'success') {
				$('.modalButtons').hide(0);
				$('#report-message').text('Thanks for your feedback! The MeetMyCampus team will review the flagged content.')
			}

		}
	});	
})

$('#save_change').click(function(){
    var _info = $(this).data('info');
    var _id = $(this).data('id');
	var _data = $("#edit_form").serialize();
	var splitData = _data.split('&');
	$.ajax({
		type: "POST",
		url: 'procedures/doEditForum.php',
		data: $("#edit_form").serialize() + '&info='+_info + '&id='+_id,
		success: function(result) {

			if (result == 'success') {
				$('#edit_forum_popup').fadeOut(250);
				$('.edit-forum').css('box-shadow',"0 0px 12px 1px #786eff");
				$('#forum_title').html(decodeURIComponent(splitData[0].split('=')[1].replace(/\+/g, '%20')).replace(/\n/g, "<br />"))
				$('#forum_post').html(decodeURIComponent(splitData[1].split('=')[1].replace(/\+/g, '%20')).replace(/\n/g, "<br />"))
				setTimeout(changeBoxShadow,4000)
				function changeBoxShadow(){
					$('.edit-forum').css('box-shadow','0 1px 4px rgba(0,0,0,0.20)');
				}
				
			}

		}
	});		
})


$('.save_button').click(function(){
	var $id = $(this).data("id");
    var _id = "#"+$(this).data("info") + $(this).data("id");
    var _info = $(this).data("type");
    $(_id).fadeIn();
    $(_id).text($(_id).next().val());
    _reply = $(_id).text();
 	$.ajax({
		type: "POST",
		url: 'procedures/doEditForum.php',
		data: {'reply':_reply,'id':$id, 'info':_info,'update_post':_reply,'update_title':"none"},
		success: function(result) {
			if (result == 'success') {
				$(_id).next().val(_reply)
			    if (_info == "edit_comment" || _info == "edit_c_comment") {
			        $('.edit_text_area').hide(0);
			        $('.edit_buttons').hide(0);
			    }else{
			    	$(_id).siblings().hide(0);
			    }
				
			}

		}
	});
    

})

