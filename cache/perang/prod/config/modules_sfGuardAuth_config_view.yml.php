<?php
// auto-generated by sfViewConfigHandler
// date: 2014/06/19 21:47:37
$context  = $this->getContext();
$response = $context->getResponse();

if ($this->actionName.$this->viewName == 'signinSuccess')
{
  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'signinSuccess')
{
  $this->setDecoratorTemplate('login_layout'.$this->getExtension());
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'symfony project', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'symfony project', false, false);
  $response->addMeta('keywords', 'symfony, project', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addStylesheet('morrisBaru.css', '', array ());
  $response->addStylesheet('bootstrap.min.css', '', array ());
  $response->addStylesheet('sb-admin.css', '', array ());
  $response->addStylesheet('font-awesome.css', '', array ());
  $response->addStylesheet('dataTables.bootstrap.css', '', array ());
  $response->addStylesheet('custom.css', '', array ());
  $response->addStylesheet('alertify.css', '', array ());
  $response->addStylesheet('alertify.default.css', '', array ());
  $response->addStylesheet('daterangepicker-bs3.css', '', array ());
  $response->addStylesheet('bootstrap.css', '', array ());
  $response->addStylesheet('side.css', '', array ());
  $response->addStylesheet('theme.bootstrap.css', '', array ());
  $response->addStylesheet('jquery.tablesorter.pager.css', '', array ());
  $response->addJavascript('raphael.js', '');
  $response->addJavascript('jqBaru.js', '');
  $response->addJavascript('morrisBaru.js', '');
  $response->addJavascript('bootstrap.min.js', '');
  $response->addJavascript('jquery.metisMenu.js', '');
  $response->addJavascript('sb-admin.js', '');
  $response->addJavascript('dataTable.js', '');
  $response->addJavascript('dataTables.bootstrap.js', '');
  $response->addJavascript('prettify.js', '');
  $response->addJavascript('alertify.js', '');
  $response->addJavascript('moment.js', '');
  $response->addJavascript('custom.js', '');
  $response->addJavascript('jq.js', '');
  $response->addJavascript('bootstrap.js', '');
  $response->addJavascript('jquery.tablesorter.js', '');
  $response->addJavascript('jquery.tablesorter.widgets.js', '');
  $response->addJavascript('jquery.tablesorter.pager.js', '');
}
else
{
  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'symfony project', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'symfony project', false, false);
  $response->addMeta('keywords', 'symfony, project', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addStylesheet('morrisBaru.css', '', array ());
  $response->addStylesheet('bootstrap.min.css', '', array ());
  $response->addStylesheet('sb-admin.css', '', array ());
  $response->addStylesheet('font-awesome.css', '', array ());
  $response->addStylesheet('dataTables.bootstrap.css', '', array ());
  $response->addStylesheet('custom.css', '', array ());
  $response->addStylesheet('alertify.css', '', array ());
  $response->addStylesheet('alertify.default.css', '', array ());
  $response->addStylesheet('daterangepicker-bs3.css', '', array ());
  $response->addJavascript('raphael.js', '');
  $response->addJavascript('jqBaru.js', '');
  $response->addJavascript('morrisBaru.js', '');
  $response->addJavascript('bootstrap.min.js', '');
  $response->addJavascript('jquery.metisMenu.js', '');
  $response->addJavascript('sb-admin.js', '');
  $response->addJavascript('dataTable.js', '');
  $response->addJavascript('dataTables.bootstrap.js', '');
  $response->addJavascript('prettify.js', '');
  $response->addJavascript('alertify.js', '');
  $response->addJavascript('moment.js', '');
  $response->addJavascript('custom.js', '');
}

