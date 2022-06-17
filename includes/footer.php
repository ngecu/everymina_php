<style>
  .barongo {
        display: flex;
        flex-wrap: wrap;
         !<--margin:70; -->
    }
    
    .pull-right {
        display:flex;
        padding-right: 5%;
    }
    .pull-right a{
        
        padding: 5%}
        
</style>
	<!-- Begin Footer
	================================================= -->
	
	
	<div class="footer">
		<p class="pull-left">
			 Copyright &copy; 2022 EveryMina
		</p>
		<p class="pull-right">
			<a href="../about.php">
		    About
		</a>
		<a href="mailto: andigammark@gmail.com">
		    Contact
		</a>
		</p>
		
		
		<div class="clearfix">
		</div>
	</div>
	<!-- End Footer
	================================================== -->
	<!--
	<?php require_once( ROOT_PATH . '/includes/chatbot.php') ?>
	-->

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="static/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/ie10-viewport-bug-workaround.js"></script>
<script>
		function openForm() {
			document.getElementById("myForm").style.display = "block";
		};

		function closeForm() {
			document.getElementById("myForm").style.display = "none";
		};

		function search(name) {
				if (name.length == 0) {
			 	const dataViewer = document.getElementById('dataViewer');
			const d = document.getElementById('search_result_id');
			d.innerHTML = "";
			dataViewer.innerHTML = "";
			}
			else{
			    fetchSearchData(name);
			}
		}

		function fetchSearchData(name) {
			fetch('search.php', {
					method: 'POST',
					body: new URLSearchParams('title=' + name)
				})
				.then(res => res.json())
				.then(res => viewSearchResult(res))
				.catch(e => console.error('Error' + e))
		}

		function viewSearchResult(data) {
			const dataViewer = document.getElementById('dataViewer');
			const d = document.getElementById('search_result_id');
			d.innerHTML = "<span>Search Result:<span>";
			dataViewer.innerHTML = "";
			for (let index = 0; index < data.length; index++) {
				const card = document.createElement("div");
				card.classList.add("card");
				card.innerHTML = `
				
				<a href="single_post.php?post-slug=${data[index]['slug']}">
						<img height="200" style="width:100%"
							src="/uploads/posts/${data[index]['image']}" alt="">
					</a>
					<div class="card-block">
						<h2 class="card-title"><a id=""
								href="single_post.php?post-slug=${data[index]['slug']}">${data[index]['title']}</a>
						</h2>
						<h4 class="card-text"></h4>
						<div class="card-text" style="display:none;" id="text-b">
							</div>

					
					</div>
			
					`;
				dataViewer.appendChild(card);

			}

		
		}

		// 	function readingTime(x) {
		//   const text = x.getElementById("text-b").innerText;
		//   console.log("x is ",x)
		//   const wpm = 225;
		//   const words = text.trim().split(/\s+/).length;
		//   const time = Math.ceil(words / wpm);
		//   x.getElementById("time").innerText = time;
		// }

		$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
  .fadeOut(1000)
  .next()
  .fadeIn(1000)
  .end()
  .appendTo('#slideshow');
}, 3000);
	</script>
</body>
</html>