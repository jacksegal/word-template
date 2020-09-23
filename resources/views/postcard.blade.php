<style>
	@import url('https://fonts.googleapis.com/css2?family=Kalam&display=swap');
</style>
<style>
    @font-face {
        font-family: 'UniversNextPro-HeavyCond';
        src:
            url('https://aaf1a18515da0e792f78-c27fdabe952dfc357fe25ebf5c8897ee.ssl.cf5.rackcdn.com/375/UniversNextPro-HeavyCond.woff') format('woff'),
            url('https://aaf1a18515da0e792f78-c27fdabe952dfc357fe25ebf5c8897ee.ssl.cf5.rackcdn.com/375/UniversNextPro-HeavyCond.ttf') format('truetype');
    }
     
    @font-face {
        font-family: 'UniversNextPro-Regular';
        src: 
            url('https://aaf1a18515da0e792f78-c27fdabe952dfc357fe25ebf5c8897ee.ssl.cf5.rackcdn.com/375/UniversNextPro-Regular.woff') format('woff'),
            url('https://aaf1a18515da0e792f78-c27fdabe952dfc357fe25ebf5c8897ee.ssl.cf5.rackcdn.com/375/UniversNextPro-Regular.ttf') format('truetype');
    }
</style>
<style>
	.pc-container {
		border-color: #00aeef;
		border-style: dashed;
		border-width: 8px;
		padding: 20px;
		font-family: 'UniversNextPro-Regular',sans-serif;
		max-width: 800px;
		margin: auto;
		margin-top: 50px;
	}

	.handwriting {
		font-family: 'Kalam', cursive;
	}

	.heavy-cond {
		font-family: 'UniversNextPro-HeavyCond',sans-serif;
	}

	.details {
		margin: 0;
		border-bottom: solid 1px #999999;
	}

	.details-label {
		color: #999999;
	}

	.left-col {
		width: 50%;
		border-right: solid 1px #999999;
		padding-right: 10px;
	}

	.right-col {
		width: 50%;
		padding-left: 10px;
	}

	table { border-collapse: collapse; }
</style>

<div class="pc-container">
	<table marginwidth="0" marginheight="0" style="width: 100%;">
		<tbody>
			<tr valign="top">

				{{-- Design --}}
				{{-- Details --}}
				{{-- UUK Logo --}}
				
				<td class="left-col">
					<div style="width: 390px;">
						<img src="{{$design}}" width="390">
					</div>

					<div style="margin-top: 10px;">
						<p class="details">
							<span class="details-label">First name:</span> <span class="handwriting">{{$firstname}}</span>
						</p>
						<p class="details">
							<span class="details-label">Age:</span> <span class="handwriting">{{$age}}</span>
						</p>
						<p class="details">
							<span class="details-label">School:</span> <span class="handwriting">{{$school}}</span>
						</p>
					</div>
				</td>


				<td class="right-col">

					{{-- Stamp --}}
					{{-- Message --}}
					{{-- OutRight Logo --}}
					<div style="width: 150px; float: right;">
						<img src="https://aaf1a18515da0e792f78-c27fdabe952dfc357fe25ebf5c8897ee.ssl.cf5.rackcdn.com/375/UNICEF-stamp.png" width="150">	
					</div>	

					<p class="handwriting" style="margin-top: 70px;">
						Dear COP26 President, 
					</p>
					<p class="handwriting">
						{!!nl2br($message)!!}
					</p>
					<p class="handwriting">
						Sincerely, {{$firstname}}.
					</p>

					<div style="clear: both;"></div>

				</td>
			</tr>
			<tr>
				<td class="left-col">
					<div style="width: 390px; margin-top: 20px;">
						<img src="https://downloads.unicef.org.uk/wp-content/uploads/2016/12/horizontal_logo-x2-main-unicef.png" width="390">	
					</div>					
				</td>
				<td class="right-col">
					<div style="width: 390px; margin-top: 20px;">
						<img src="https://aaf1a18515da0e792f78-c27fdabe952dfc357fe25ebf5c8897ee.ssl.cf5.rackcdn.com/375/UUK_WIDE_FECright_blue_rgb.png" width="390">
					</div>					
				</td>
			</tr>
		</tbody>
	</table>
</div>
{{-- 
<p>Firstname: {{$firstname}}</p>
<p>Age: {{$age}}</p>
<p>School: {{$school}}</p> 
--}}