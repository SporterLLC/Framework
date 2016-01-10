<!DOCTYPE html>
<html>
<head>
    <title><?=$name;?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,600" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0 0 117px;
            width: 100%;
            display: table;
            font-weight: 300;
            font-family: 'Lato';
            height: 100%;
            box-sizing: padding-box;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

		footer {
		    background-color: #F2F2F2;
		    font-size: 14px;
		    text-align: center;
		    position: absolute;
		    display: block;
		    bottom: 0px;
		    left: 0px;
		    right: 0px;
		    padding: 50px;
		}

		.bar {
		    background-color: #F2F2F2;
		    font-size: 14px;
		    position: absolute;
		    display: block;
		    top: 0;
		    left: 0;
		    right: 0;
		    padding: 10px;
		}

		.col-10 {
			width: 80%;
			max-width: 840px;
			margin: 0 auto;
		}

		.col-6 {
			width: 50%;
			display: inline-block;
			float: left;
		}

		.test-left {
			text-align: left;
		}

		.test-right {
			text-align: right;
		}

        .content {
           text-align: center;
           display: inline-block;
        }

        .title {/*
            font-size: 96px;*/
            font-size: 170px;
            line-height: 134px;
            font-weight: 600;
        }

        .small {/*
            font-size: 36px;*/
            font-size: 66px;
            line-height: 54px;
        }
    </style>
</head>
<body>
    <div class="bar">
    	<div class="col-10">
    		<div class="col-6 test-left">Welcome to <span style="font-weight:600;"><?=$this->config_item('site_name');?></span></div>
    		<div class="col-6 test-right"><?=date("F j, Y, g:i a");?></div>
    	</div>
    </div>
    <div class="container">
        <div class="content">
            <div class="title"><?=$code;?></div>
            <div class="small"><?=$name;?></div>
        </div>
    </div>
    <footer>Copyright © <?=date('Y');?> <?=$this->config_item('site_name');?></footer>
</body>
</html>