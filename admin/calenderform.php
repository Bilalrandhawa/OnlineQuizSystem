

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>Canvas Admin - Calendar</title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />		
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	
		
	<link rel="stylesheet" href="stylesheets/all.css" type="text/css" />
	
	<!--[if gte IE 9]>
	<link rel="stylesheet" href="stylesheets/ie9.css" type="text/css" />
	<![endif]-->
	
	<!--[if gte IE 8]>
	<link rel="stylesheet" href="stylesheets/ie8.css" type="text/css" />
	<![endif]-->
	<link rel="stylesheet" href="stylesheets/sample_pages/calendar.css" type="text/css" />	

</head>

<body>

<div id="wrapper">
	
	<div id="header">
		<h1><a href="dashboard.html">Canvas Admin</a></h1>		
		<a href="javascript:;" id="reveal-nav">
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
			<span class="reveal-bar"></span>
		</a>
	</div> <!-- #header -->
	<div id="sidebar">		
		<?php include ("linking.php");
        $event="[{title:"quiz1",start:new Date('2021-10-22') },{title:"quiz2",start:new Date ('2021-10-24') }]";   
		 ?>
		</div>
	<div id="search">
		<form>
			<input type="text" name="search" placeholder="Search..." id="searchField" />
		</form>		
	</div> <!-- #search -->
	
	
	<div id="content">		
		
		<div id="contentHeader">
			<h1>Calendar</h1>
		</div> <!-- #contentHeader -->	
		
		<div class="container">				
				
			<div class="grid-17">				
				
				<div class="widget widget-calendar">
					
					<div class="widget-header">
						<span class="icon-calendar"></span>
						<h3>Calendar</h3>
					</div> <!-- .widget-header -->
				
					<div class="widget-content">						
						
						<div id="calendar-holder"></div>
				
					</div> <!-- .widget-content -->
				
				</div> <!-- .widget -->				
				
			</div> <!-- .grid -->
			
			
			
			



<script src="javascripts/all.js"></script>

<script>

$(function () {
var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar-holder').fullCalendar({
			header: {
				left: 'prev, next',
				center: 'title',
				right: 'month,basicWeek,basicDay,'
			},
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar-holder').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				//if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				//}
				
			},
			events:'<?php echo $event; ?>'
		});
		
		
		
		
	/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
});

</script>
<?php
$php_variable = 'abc';
?>			
        <script> js_variable_name = "<?php echo $php_variable; ?>";</script>

</body>
</html>