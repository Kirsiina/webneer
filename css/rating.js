$('#ratingform').on('submit', function(event) {
  event.preventDefault();
  var formData = $(this).serialize();
  $.ajax({
    type : 'POST',
    url : 'product-page.php',
    data : formData,
    success:function(response) {
      $("#ratingform")[0].reset();
      window.setTimeout(function(){window.location.reload()},1000)
    }
  })
})
