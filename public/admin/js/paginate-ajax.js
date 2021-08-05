		var pageLinks = document.querySelectorAll('.page-link');
		for (var i = 0; i < pageLinks.length; i++) {
			var pageLink = pageLinks[i];
			pageLink.onclick = function(event) {
				event.preventDefault();
				link = this.href;
				console.log(2)
				$.ajax({
					url: link,
					type: "GET",
					dataType: 'html',
				}).done(function(data) {
					$('#list-data').html(data);
					document.querySelector('#list-data').innerHTML = data
				});
			}
		}