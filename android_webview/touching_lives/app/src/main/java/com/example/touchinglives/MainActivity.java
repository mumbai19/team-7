package com.example.touchinglives;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

  private WebView webView;
  @Override
  protected void onCreate(Bundle savedInstanceState) {
    super.onCreate(savedInstanceState);
    setContentView(R.layout.activity_main);

    String url = "https://adminlte.io/themes/AdminLTE/index2.html";
    webView = findViewById(R.id.webview);
    webView.setWebViewClient(new WebViewClient());
    webView.getSettings().setAppCachePath(getApplication().getCacheDir().getAbsolutePath() );
    webView.getSettings().setAllowFileAccess( true );
    webView.getSettings().setAppCacheEnabled( true );
    webView.getSettings().setJavaScriptEnabled( true );
    webView.getSettings().setCacheMode( WebSettings.LOAD_DEFAULT );


    webView.loadUrl(url);


  }
}
