<?php

class Template extends MY_Controller
{

	protected $page_header, $content_view, $page_title, $page_description;

	protected $css, $js;

	protected $javascript_file, $javascript_data;
	function __construct()
	{
		parent::__construct();
	}

	function call_admin_template($data =NULL)
	{
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['content_view'] = $this->content_view;
		$data['page_title'] = $this->page_title;
		$data['page_description'] = $this->page_description;
		$data['javascript_file'] = $this->javascript_file;
		$data['javascript_data'] = $this->javascript_data;
		$this->load->view('Template/dashboard_template_v', $data);
	}

	function setContentView($content_view)
	{
		$this->content_view = $content_view;

		return $this;
	}

	function setPageTitle($page_title)
	{
		$this->page_title = $page_title;

		return $this;
	}

	function setPageDescription($page_description)
	{
		$this->page_description = $page_description;

		return $this;
	}

	function addCss($css_link, $external = FALSE)
	{
		$link = ($external == FALSE) ? $this->config->item('assets_url') . $css_link : $css_link;

		$this->css .="<link rel='stylesheet' href='{$link}' />\n";

		return $this;
	}

	function addJs($js_link, $external = FALSE)
	{
		$link = ($external == FALSE) ? $this->config->item('assets_url') . $js_link : $js_link;

		$this->js .= "<script src = '{$link}'></script>\n";

		return $this;
	}

	function setJavascript($javascript_file, $data = NULL)
	{
		$this->javascript_file = $javascript_file;
		$this->javascript_data = $data;
	}
}