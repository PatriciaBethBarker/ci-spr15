<?
//read-feed-simpleXML.php
//our simplest example of consuming an RSS feed

  $request = "http://rss.news.yahoo.com/rss/software";
  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }




///////model////

	public function get_rss($request)
	{
		$response = file_get_contents($request);
		return simplexml_load_string($response);
	}


//////controller////

public function index($provider)
	{//here we're making data available to our header and footer
	
		switch($provider)
		{
			case 'yahoo';
			$request= 'http://rss.news.yahoo.com/rss/software';
			break;
			
			default:	
			$request= 'https://news.google.com/news/feeds?pz=1&cf=all&ned=us&hl=en&output=rss';
			
		}
		$this->load->model('News_model');
		$data['xml'] = $this->News_model->get_rss($request);
	
		$data['title'] = "Here is our title tag!";
		$data['style'] = "cerulean.css";
		$data['banner'] = "Here is our Web Site!";
		$data['copyright'] = "copyright goes here!";
		$data['base_url'] = base_url();
		$this->load->view('header',$data);
		
		//var_dump($data['query']);
		$this->load->view('news_view',$data);
		
		$this->load->view('footer',$data);
	}



	///////View////////

	<?php
	//views/news_view.php
	  print '<h1>' . $xml->channel->title . '</h1>';
	  echo '<p>' . $xml->channel->description . '</p>';
	  foreach($xml->channel->item as $story)
	  {
	    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
	    echo '<p>' . $story->description . '</p><br /><br />';
	  }
	  
	?>


