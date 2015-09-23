// JavaScript Document
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
			
			$(document).ready(function() {
				
				$('.too-plain').focus(function() {
		
					if($(this).val() == "Enter your email here")
						$(this).val('');
		
				}).blur(function() {
		
					if($(this).val() == "")
						$(this).val('Enter your email here');
		
				});
				
				$('.username-label, .password-label').animate({ opacity: "0.4" })
					.click(function() {
						var thisFor	= $(this).attr('for');
						$('.'+thisFor).focus();
				});
			
				$('.username').focus(function() {
				
					$('.username-label').animate({ opacity: "0" }, "fast");
				
						if($(this).val() == "username")
							$(this).val() == "";
		
					}).blur(function() {
				
						if($(this).val() == "") {
							$(this).val() == "username";
							$('.username-label').animate({ opacity: "0.4" }, "fast");
						}
					});
			
				$('.password').focus(function() {
				
					$('.password-label').animate({ opacity: "0" }, "fast");
				
						if($(this).val() == "password") {
							$(this).val() == "";
						}
					}).blur(function() {
				
						if($(this).val() == "") {
							$(this).val() == "password";
							$('.password-label').animate({ opacity: "0.4" }, "fast");
						}
				});
				
				$('.username-label-sliding, .password-label-sliding').animate({ opacity: "0.4" })
					.click(function() {
						var thisFor	= $(this).attr('for');
						$('.'+thisFor).focus();
				});
			
				$('.username-sliding').focus(function() {
				
					$('.username-label-sliding').animate({ marginLeft: "7em" }, "fast");
				
						if($(this).val() == "username")
							$(this).val() == "";
		
					}).blur(function() {
				
						if($(this).val() == "") {
							$(this).val() == "username";
							$('.username-label-sliding').animate({ marginLeft: "12px" }, "fast");
						}
					});
			
				$('.password-sliding').focus(function() {
				
					$('.password-label-sliding').animate({ marginLeft: "7em" }, "fast");
				
						if($(this).val() == "password") {
							$(this).val() == "";
						}
					}).blur(function() {
				
						if($(this).val() == "") {
							$(this).val() == "password";
							$('.password-label-sliding').animate({ marginLeft: "12px" }, "fast");
						}
				});
				
			});
			