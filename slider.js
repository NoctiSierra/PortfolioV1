jQuery(document).ready(function ($)
{

  $('#checkbox').change(function()
  {
    setInterval(function ()
    {
        moveRight();
    }, 3000);
  });
  

    var slideWidth = {}

    $('div.slider').each(function () {
        slideWidth[this.id] = $('#' + this.id + ' ul li').width();
        var slideCount = $('#' + this.id + ' ul li').length;
        var slideHeight = $('#' + this.id + ' ul li').height();
        var sliderUlWidth = slideCount * slideWidth[this.id];

        $('#' + this.id).css({ width: slideWidth[this.id], height: slideHeight });
    
        $('#' + this.id  + ' ul').css({ width: sliderUlWidth, marginLeft: - slideWidth[this.id] });
    
        $('#' + this.id + ' ul li:last-child').prependTo('#' + this.id + ' ul');
    });

    function moveLeft(id)
    {
        $('#' + id + ' ul').animate({
            left: + slideWidth[id]
        }, 200, function () {
            $('#' + id + ' ul li:last-child').prependTo('#' + id + ' ul');
            $('#' + id + ' ul').css('left', '');
        });
    };

    function moveRight(id)
    {
        $('#' + id + ' ul').animate({
            left: - slideWidth[id]
        }, 200, function () {
            $('#' + id + ' ul li:first-child').appendTo('#' + id + ' ul');
            $('#' + id + ' ul').css('left', '');
        });
    };

    $('a.control_prev').click(function (event)
    {
        moveLeft(event.target.parentElement.id);
    });

    $('a.control_next').click(function (event)
    {
        moveRight(event.target.parentElement.id);
    });

});    
