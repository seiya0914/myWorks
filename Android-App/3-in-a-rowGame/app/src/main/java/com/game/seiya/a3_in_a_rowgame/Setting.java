package com.game.seiya.a3_in_a_rowgame;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentActivity;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;

public class Setting extends FragmentActivity {
    ViewPager mViewPager;

    public static SharedPreferences sharedPreferences;

    public static final String GAME_PREFS = "GamePREFS";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.settingpager);
        mViewPager = (ViewPager) findViewById(R.id.settingpager);
        /** set the adapter for ViewPager */
        mViewPager.setAdapter(new PagerAdapter(getSupportFragmentManager()));
        mViewPager.setPageTransformer(true,new ZoomOutPageTransformer());

        sharedPreferences = getSharedPreferences(GAME_PREFS, Context.MODE_PRIVATE);
    }

}

