package com.game.seiya.a3_in_a_rowgame;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentActivity;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;

/**
 * Created by Student on 20/06/2016.
 */
public class PagerAdapter extends FragmentPagerAdapter {

    /** Defining a FragmentPagerAdapter class for controlling the fragments to be shown when user swipes on the screen. */
    public PagerAdapter(FragmentManager fm){
        super(fm);
    }

    @Override
    public Fragment getItem(int position){
        /** Show a Fragment based on the position of the current screen */
        if(position==0){
            return new SettingFragment();
        }
        else if(position==2){
            return new RankingFragment();
        }
        else{
            return new HelpFragment();
        }
    }

    @Override
    public int getCount(){
        //show 3 total pages.
        return 3;
    }
}
