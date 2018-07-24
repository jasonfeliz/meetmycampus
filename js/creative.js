$ (function() {
   
    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 1
        }
    })

    // Initialize and Configure Scroll Reveal Animation
    window.sr = ScrollReveal();
    sr.reveal('.sr-icons', {
        duration: 800,
        scale: 0.3,
        distance: '100px'
    }, 400);
    sr.reveal('.sr-button', {
        duration: 1000,
        delay: 200
    });
    sr.reveal('.sr-contact', {
        duration: 600,
        scale: 0.3,
        distance: '0px'
    }, 300);

    // Initialize and Configure Magnific Popup Lightbox Plugin
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });

    var collegeList;
    var collegeListSignUp;
    var collegeListUrl =  './json/college_list2.json';
    $.getJSON(collegeListUrl,function(data){
        collegeList = data;
        $("#explore-colleges").autocomplete({
                delay: 200,
                minLength: 2,
                source: collegeList,
                select: function(event, ui) { 
                    $("#explore-colleges").val(ui.item.value);
                    $("#explore-colleges-form").submit(); }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.value + "</div>" )
        .appendTo( ul );
        };
    });
    $.getJSON(collegeListUrl,function(data){
        collegeListSignUp = data;
        $("#collegeSignUp").autocomplete({
                delay: 200,
                minLength: 2,
                source: collegeListSignUp,
                appendTo: $('#signUpForm'),
                select: function(event, ui) { 
                    $("#collegeSignUp").val(ui.item.value); }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" ).append( "<div>" + item.value + "</div>" ).appendTo( ul );
        };
    });
    
    $("#user-major").autocomplete({
        delay: 200,
        minLength: 5,
        source: 'procedures/doSearch.php',
        appendTo: $('#signUpForm'),
        select: function(event, ui) { 
            $("#user-major").val(ui.item.value);
        }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" ).append( "<div>" + item.value + "</div>" ).appendTo( ul );
    };

    $("#ud-major").autocomplete({
        delay: 200,
        minLength: 3,
        source: 'procedures/doSearch.php',
        appendTo: $('#ud-profile'),
        select: function(event, ui) { 
            $("#ud-major").val(ui.item.value);
            $("#ud-major-id").val(ui.item.label);}
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" ).append( "<div>" + item.value + "</div>" ).appendTo( ul );
    };  

}) // End of use strict
function not_signed_in_modal(param){
    if (typeof param === "undefined" || param === null) { 
        $('#not-signed-in').fadeIn(250);
        $('#login-modal-header').text('You must be logged in to continue');      
    }else{
        $('#not-signed-in').fadeIn(250);
        $('#login-modal-header').text('Log In');
    }

}

function non_school_student_modal(){
    $('#non-school-student').fadeIn(250);
}

function non_community_member(){
    $('#non-community-member').fadeIn(250);
}
$('#closeModal, #closeModal2').click(function(){
    $('.modal').fadeOut(250);
});
$('#confirm-modal span.close,#confirm-community span.close,#not-signed-in span.close,#non-school-student span.close, #non-community-member span.close','#report-modal .close').click(function(){
    $('.modal').fadeOut(250);
})
$(window).click(function(e){
    if (e.target.id == 'report-modal' || e.target.id == 'confirm-modal' || e.target.id == 'confirm-community' ||e.target.id == 'not-signed-in' ||e.target.id == 'non-school-student' || e.target.id == 'non-community-member') {
         $('.modal').fadeOut(250);
    }
});
$('#report-modal span.close').click(function(){
    $('#report-modal').fadeOut(250)
})
// modal window
// Get the modal
var modal = $('#myModal');
var modalSignIn = $('#mySignInModal');
var createCommunityModal = $('#createCommunityModal');
var createCommunityModal2 = $('#createCommunityModal2');
var messageModal = $('#messageModal');
// var messageModal = $('messageModal');

// Get the button that opens the modal
var btn = $(".register-button:eq( 0 ),.register-button:eq( 1 )");
var btnSignIn = $(".signIn-button:eq( 0 ),.signIn-button:eq( 1 )");
var createCommunityBtn = $("#createCommunityBtn");
var createCommunityBtn2 = $("#createCommunityBtn2");
var messageBtn = $("#messageBtn");
// Get the <span> element that closes the modal
var span = $(".close:eq( 0 ), .close:eq( 1 ),.close:eq( 2 ),.close:eq( 3 ),.close:eq( 4 ),.close:eq( 5 )");
var spanSignIn = $(".close:eq( 1 )");
// When the user clicks on the button, open the modal 
btn.click(function(){
    modal.show();

}) 
btnSignIn.click(function(){
    modalSignIn.show();
})
createCommunityBtn.click(function(){
    createCommunityModal.fadeIn(250);
})
createCommunityBtn2.click(function(){
    createCommunityModal2.fadeIn(250);
})
messageBtn.click(function(){
    messageModal.fadeIn(250);
})
// When the user clicks on <span> (x), close the modal
span.click(function(){
    createCommunityModal.hide();
    messageModal.hide();
    modal.hide();
    $('#userGroupList').hide(0);
    $('.submitError').hide(0);
    $('#collegeForm input[type="email"]').css({'border-color': '', 'border-width':''})
    $('#signUpButton').prop("disabled",false);
    $('#collegeForm input, #highSchoolForm input').val("");
    $('#collegeSignUp').prop('readonly',false);
})

spanSignIn.click(function(){
    modalSignIn.hide();
    messageModal.hide();
    createCommunityModal2.hide();
})

// When the user clicks anywhere outside of the modal, close it
$(window).click(function(e){
    if (e.target.id == "myModal") {
        modal.hide();
        $('#userGroupList').hide(0);
        $('.submitError').hide(0);
        $('#collegeForm input[type="email"]').css({'border-color': '', 'border-width':''})
        $('#signUpButton').prop("disabled",false);
        $('#collegeForm input, #highSchoolForm input').val("");
        $('#collegeSignUp').prop('readonly',false);
    }else if (e.target.id == "mySignInModal") {
        modalSignIn.hide();
        $('#userGroupList').hide(0);
        $('#collegeForm input, #highSchoolForm input').val("");
    }else if (e.target.id == "createCommunityModal" || e.target.id == "createCommunityModal2") {
        createCommunityModal.hide();
        createCommunityModal2.hide();

    }else if (e.target.id == "messageModal") {
        messageModal.hide();

    }
});


//Join Us JS

$('#userType, #dropdownArrow').click(function(){
    var userTypeBox = $('.userGroupList');
    if (userTypeBox.css('display') == 'block') {
         userTypeBox.hide();
    }else{
        userTypeBox.show();
    }
})

$('#userGroupList > li').click(function(){
    var userType = $(this).text();
    var collegeForm = $('#collegeForm');
    var highSchoolForm = $('#highSchoolForm');
    if (userType == 'High School Student') {
         collegeForm.hide(0);
         highSchoolForm.fadeIn(1000);
         $('#userType').text("High School Student").hide(0).fadeIn(50);
         $(this).addClass('selected');
         $(this).siblings().removeClass('selected');
         $('#userGroupList').hide();
         $('#highSchoolForm input').prop('required',true)
         $('#collegeForm input').prop('required',false)
         $('#signUpButton').prop("disabled",false);
    }else if(userType == 'College Student') {
         highSchoolForm.hide(0);
         collegeForm.fadeIn(1000);
         $('#userType').text("College Student").hide(0).fadeIn(50);
         $(this).addClass('selected');
         $(this).siblings().removeClass('selected');
         $('#userGroupList').hide(0);
         $('#collegeForm input').prop('required',true)
         $('#highSchoolForm input').prop('required',false)
    }
})

$('#emailSchool > input[type="email"], #ud-email').blur(function(){
    var emailSubstring;
    var stringPosition;
    var userEmail = $(this).val();
    var emailString = userEmail.substr(userEmail.indexOf("@") + 1);
    var periodOccurrrence = emailString.split('.').length - 1;
    var collegeList;
    var collegeListUrl =  './json/college_list.json';
    if (periodOccurrrence == 1) {
        emailSubstring = emailString.substr(emailString.indexOf("."));
    } else {
        stringPosition1 = emailString.split(".", 1).join(".").length + 1;
        stringPosition2 = emailString.split(".", 2).join(".").length;
        emailSubstring = emailString.substr(stringPosition2);
        emailString = emailString.substr(stringPosition1);
    }
    if (emailSubstring == ".edu" || userEmail == "") {
        $('#collegeForm input[type="email"]').css({'border-color': '', 'border-width':''})
        $('.submitError').fadeOut(500);
        $('#signUpButton, #save-button').prop("disabled",false);
        $.getJSON(collegeListUrl,function(data){
        collegeList = data;
        $.each( collegeList, function( i, val ) {
          if(collegeList[i]['email_url'] == emailString){
            $('#collegeSignUp, #ud-university').prop('readonly',true).val(collegeList[i]['college_name']);
          }
            });
        });
    }else if (emailSubstring != ".edu"){
        $('.submitError').fadeIn(500);
        $('#signUpButton, #save-button').prop("disabled",true);
        $('#collegeForm input[type="email"]').css({'border-color': 'red', 'border-width':'2px'})
    }

})

$('#joinUsButtonBottom').click(function(){
    modal.show();
    $studentEmail = $('#joinUsBottom').val();
    $('input[name="userCollegeEmail"]').val($studentEmail).blur();
})


    $("#community,#freshmen,#grad_students,#undergrads,#admissions,#getting_in").click(function(e){
          var $tab = $('.main-topics-list').find('li.box-selected');
          $tab.removeClass('box-selected');
          $(this).addClass('box-selected');
    }); 
    $("#communities,#academics_career,#recreation_sports,#student_life,#local_events,#meetups").click(function(e){
          var $tab = $('.main-topics-list').find('li.box-selected');
          $tab.removeClass('box-selected');
          $(this).addClass('box-selected');
    }); 
;
 $(".nav-school-list > li > a").click(function(e){
    e.preventDefault();
 })

    $("#fav-interest,#fav-colleges,#fav-communities,#fav-discussions,#fav-events").click(function(e){
          var $tab = $('.nav-tab-list').find('li.nav-tab-selected');
          $tab.removeClass('nav-tab-selected');
          $(this).addClass('nav-tab-selected');
    });

  $(".community-color-selection > label").click(function(e){
          var $tab = $('.community-color-selection').find('label.button-selected');
          $colorGrab = $(this).css("background");
          $('.community-color-banner').css("background",$colorGrab);
          $tab.removeClass('button-selected');
          $(this).addClass('button-selected');
    });
 $("#public, #private").click(function(e){
          var type = $(this).attr('id');
          if (type == "public" || type == "public_e") {
            $('#private-type').css('display','none');
            $('#public-type').css('display','block');
          }else if(type == 'private' || type == 'private_e'){
            $('#public-type').css('display','none');
            $('#private-type').css('display','block');
          }
    });
 //set default date for event dates
 today =  new Date();
y = today.getFullYear();
m = today.getMonth() + 1;
if (m < 10) {
    m = "0" + m;
}
d = today.getDate();
if(d< 10){
    d = "0"+d;
}



//upload image preview
$(document).ready(function() {
    $("#event-date").attr('value',y + "-" + m + "-" + d);
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "+ Add Photo",   // Default: Choose File
    label_selected: "Change Photo",  // Default: Change File
    no_label: false,                // Default: false
    success_callback: function() {
      $('#image-preview label').css('background-color','#bdc3c7');
    }
  });
});


$(".rating > label").click(function(){
    $('#review-rating').html($(this).attr('title')).attr('style', 'margin: 15px 0 !important');
})

$('#search-button').click(function(){
    input = $('.sm-screen-search-input');
        if (input.css('display') == 'none') {
            $(this).removeClass('fa-search');
            $(this).addClass('fa-times');
            input.hide().show().focus();
        }else if($(this).hasClass('fa-times')){
            $('#search-button').removeClass('fa-times');
            $('#search-button').addClass('fa-search');
            input.hide();
        }

});
$('#menu-button').click(function(){
    input = $('#mobile-menu');
        if (input.css('display') == 'none') {
            $(this).removeClass('fa-bars');
            $(this).addClass('fa-times');
            input.hide().show().focus();
        }else if($(this).hasClass('fa-times')){
            $('#menu-button').removeClass('fa-times');
            $('#menu-button').addClass('fa-bars');
            input.hide();
        }

});
    $(".profile-abbrev").hover(function(){
        $(this).css({'border-color': '#5a626f', 'color':'#5a626f'});
    }, function(){
        $(this).css({'border-color': '#DF7367', 'color':'#DF7367'});
    });




    $( ".community-color-selection label input" ).map(function(){
        var communityColor = $('#colorValue').val();
        if ($( this ).val() == communityColor) {
            $( this ).attr('checked',true);
            $(this ).parent().addClass('button-selected');
        }
    })

$('#removeX').click(function(){
    $('#c-requests-message').slideUp(400);
})

function openCommunityRequest(id){
        $.ajax({
             type: "POST",
             url: 'procedures/doCommunityRequest.php',
             data: {'id': id},
             success: function(result) {
                if (result == 'success') {
                    $('#community-request').show();
                    $('#c-requests-message').slideUp(400);
                }
             }
        });
}

$('#community-request .close').click(function(){
    $('#community-request').hide();
    location.reload();
})

    $("#discussion-item,#meetup-item,#about-item").click(function(e){
          var $item = $('.nav-community-list').find('li.nav-selected');
          $item.removeClass('nav-selected');
          $(this).addClass('nav-selected');
    }); 

var $tabs = $('.tabs > div'), _currhash, $currTab;

function showTab() {
   if($currTab.length>0) {  
        $tabs.removeClass('active');
        $currTab.addClass('active');
   }
}
/* find the tabs and 'unlink' the id to prevent page jump */
$tabs.each(function() {
   var _id = $(this).attr('id');
   $(this).attr('id',_id+'_tab');
   /* eg we have given the tab an id of 'tab1_tab' */
});

/* set up an anchor 'watch' for the panels */
function anchorWatch() {
  if(document.location.hash.length>0) {
    /* only run if 'hash' has changed */
    if(_currhash!==document.location.hash) {
       _currhash = document.location.hash;
       /* we only want to match the 'unlinked' id's */
       $currTab = $(_currhash+'_tab');
        var $item = $('.nav-community-list').find('li.nav-selected');
        $item.removeClass('nav-selected');
       if (_currhash == "#discussions") {
            $('#discussion-item').addClass('nav-selected');
       }else if(_currhash == "#meetup"){
            $('#meetup-item').addClass('nav-selected');
       }else if (_currhash == "#about"){
            $('#about-item').addClass('nav-selected');
       }
       showTab();
   }
  }
} 
setInterval(anchorWatch,0);


$('.home-header-section input, .browse-heading input').focus(function(){
    $('.search-overlay').fadeIn(500);
    $('.search-overlay input').focus();
    $(this).blur();
})
$('.search-overlay .closeSearch').click(function(){
    $('.search-overlay').fadeOut(100);
    $('.search-overlay input').val("");
    $('#search_results_d, #search_result_c').html('');
})

$('.report-btn').click(function(){
    var _type = $(this).data('type');
    var _id = $(this).data('id');
    $('#report-modal').fadeIn(200);
    $('#reportYes').attr({'data-type':_type,'data-id':_id})
})

$('.edit_discussion').click(function(){
    $('#edit_forum_popup').fadeIn(250);
})

$('.edit_reply, .edit_comment').click(function(){
    _id = "#"+$(this).data("info") + $(this).data("id");
    _reply = $(_id).text();
    $(_id).hide(0);
    $(_id).siblings().show();
    $(_id).next().text(_reply)
    $(_id).next().focus()
})

$('.cancel_button').click(function(){
    _id = "#"+$(this).data("info") + $(this).data("id");
    $(_id).fadeIn();
    _reply = $(_id).text();
    $(_id).next().val(_reply)
    if ($(this).data('info')=="d_comment_edit_" || $(this).data('info')=="c_comment_edit_") {
        $('.area_comment').hide(0);
        $('.edit_buttons').hide(0)
    }else{
        $(_id).siblings().hide(0);
    }
    

})

