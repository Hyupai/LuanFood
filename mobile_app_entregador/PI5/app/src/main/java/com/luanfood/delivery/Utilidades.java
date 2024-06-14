package com.luanfood.delivery;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;

public class Utilidades {

    public static void alert_Aviso(String titulo, String mensagem, Context context) {
        AlertDialog.Builder alertDialog = new AlertDialog.Builder(context);
        alertDialog.setTitle(titulo);
        alertDialog.setMessage(mensagem);
        alertDialog.setCancelable(false);
        alertDialog.setPositiveButton("OK", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                // nada
            }
        });
        alertDialog.create().show();
    }

}