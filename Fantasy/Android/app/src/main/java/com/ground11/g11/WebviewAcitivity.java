package com.ground11.g11;

import android.content.Context;
import android.os.Bundle;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageView;
import android.widget.TextView;

public class WebviewAcitivity extends AppCompatActivity {

    private WebView wv1;
    WebviewAcitivity activity;
    Context context;
    ImageView im_back;
    TextView tv_HeaderName;
    SwipeRefreshLayout swipeRefreshLayout;
    String IntentHeading,IntentURL;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_webview_acitivity);
        context = activity = this;
        IntentHeading = getIntent().getStringExtra("Heading");
        IntentURL = getIntent().getStringExtra("URL");
        initViews();

        swipeRefreshLayout = findViewById(R.id.swipeRefreshLayout);
        swipeRefreshLayout.post(new Runnable() {
                                    @Override
                                    public void run() {
                                        swipeRefreshLayout.setRefreshing(true);
                                        LoadPage(IntentURL);
                                    }
                                }
        );

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                LoadPage(IntentURL);

            }
        });

    }

    public void initViews(){

        im_back = findViewById(R.id.im_back);
        tv_HeaderName = findViewById(R.id.tv_HeaderName);
        wv1= findViewById(R.id.webView1);

        tv_HeaderName.setText(IntentHeading);
        im_back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onBackPressed();
            }
        });

    }

    public void LoadPage(String Url){
        wv1.setWebViewClient(new MyBrowser());
        wv1.setWebChromeClient(new WebChromeClient() {
            public void onProgressChanged(WebView view, int progress) {
                if (progress == 100) {
                    swipeRefreshLayout.setRefreshing(false);
                } else {
                    swipeRefreshLayout.setRefreshing(true);
                }
            }
        });
        wv1.getSettings().setLoadsImagesAutomatically(true);
        wv1.getSettings().setJavaScriptEnabled(true);
        wv1.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        wv1.loadUrl(Url);
    }

    private class MyBrowser extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            view.loadUrl(url);
            return true;
        }
    }

}
