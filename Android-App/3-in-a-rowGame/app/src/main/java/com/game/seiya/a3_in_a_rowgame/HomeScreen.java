package com.game.seiya.a3_in_a_rowgame;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.view.animation.AlphaAnimation;
import android.view.animation.Animation;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class HomeScreen extends AppCompatActivity {

    SharedPreferences sharedPreferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_screen);

        sharedPreferences = getSharedPreferences("GamePREFS", Context.MODE_PRIVATE);

        if(sharedPreferences.getString("Colour1","")=="" || sharedPreferences.getString("Colour2","")=="" || sharedPreferences.getString("Size","")=="" || sharedPreferences.getString("Diff","")=="") {
            gameVariables.gameVariableAssign("Red","Blue","4 × 4","Easy");//Default setting values for  the first launch
        }
        else{
            gameVariables.gameVariableAssign(sharedPreferences.getString("Colour1", ""), sharedPreferences.getString("Colour2", ""), sharedPreferences.getString("Size", ""), sharedPreferences.getString("Diff",""));
        }


        RelativeLayout rlayout = (RelativeLayout)findViewById(R.id.homeLayout);
        rlayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent game = new Intent(HomeScreen.this,Game.class);
                startActivity(game);
            }
        });

        rlayout.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View v) {
                Intent setting = new Intent(HomeScreen.this,Setting.class);
                startActivity(setting);
                return false;
            }
        });
        TextView txt = (TextView)findViewById(R.id.textView);
        TextView txt2 = (TextView)findViewById(R.id.textView2);
        Animation anim = new AlphaAnimation(0.0f,1.0f);
        anim.setDuration(700);
        anim.setStartOffset(20);
        anim.setRepeatCount(Animation.INFINITE);
        anim.setRepeatMode(Animation.REVERSE);
        txt.startAnimation(anim);
        txt2.startAnimation(anim);
    }


}
