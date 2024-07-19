// WEB APPLICATION DEVELOPMENT 1
// PRACTICAL EXAM
// UY - 20000472810

// THIS JAVASCRIPT IS FOR THE NAVBAR TO BE ABLE TO WIRK WITH SECTIONS OF THE PAGE
// AVOIDING CREATING TOO MANY HTML PAGES WITH SAME CODE WHEN USING NAVBAR

$(function() {
    $('nav ul li a').click(function(event) {
        event.preventDefault();
        var target = $(this).attr('href');
        $('nav ul li a').removeClass('active');
        $(this).addClass('active');
        $('section').removeClass('show').addClass('hidden');
        $(target).removeClass('hidden').addClass('show');
    });
});