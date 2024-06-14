package com.luanfood.delivery;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.webkit.JavascriptInterface;
import android.webkit.WebChromeClient;
import android.webkit.WebResourceRequest;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import androidx.annotation.RequiresApi;

public class MainActivity extends Activity {
    private WebView webView;
    public static String TAG = "LuanFoodApp";

    @RequiresApi(api = Build.VERSION_CODES.O)
    @SuppressLint("SetJavaScriptEnabled")
    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Log.d(TAG, "onCreate");
        CarregarWebViewLogin();
    }

    public void CarregarWebViewLogin() {
        webView = new WebView(this);
        setContentView(webView);

        webView.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                return false;
            }
        });

        webView.setWebChromeClient(new WebChromeClient());
        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webView.addJavascriptInterface(new WebAppInterface(this), "Android");
        webView.loadUrl("https://a7bx.pro/samuel2/entregador/template/login.php");
    }

    // classe para interação entre JavaScript e Java
    public class WebAppInterface {
        private MainActivity mActivity;
        WebAppInterface(MainActivity activity) {
            mActivity = activity;
        }
        @JavascriptInterface
        // Exemplo de metodo
        public void login(String codigo, String senha, boolean salvarLogin) {

        }
    }
}
