package com.game.seiya.a3_in_a_rowgame;


import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.AlphaAnimation;
import android.view.animation.Animation;
import android.widget.TextView;

import org.w3c.dom.Text;

import java.io.IOException;


/**
 * A simple {@link Fragment} subclass.
 */
public class RankingFragment extends Fragment {


    public RankingFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        //get view objects from layout
        View view = inflater.inflate(R.layout.fragment_ranking, container, false);

        TextView txt = (TextView)view.findViewById(R.id.txtToHelp);

        //to keep the TextView blinking
        Animation anim = new AlphaAnimation(0.0f,1.0f);
        anim.setDuration(700);
        anim.setStartOffset(20);
        anim.setRepeatCount(Animation.INFINITE);
        anim.setRepeatMode(Animation.REVERSE);
        txt.startAnimation(anim);

        TextView size4First = (TextView)view.findViewById(R.id.size4FirstTime);

        TextView size4Second = (TextView)view.findViewById(R.id.size4SecondTime);

        TextView size4Third = (TextView)view.findViewById(R.id.size4ThirdTime);

        TextView size5First = (TextView)view.findViewById(R.id.size5FirstTime);

        TextView size5Second = (TextView)view.findViewById(R.id.size5SecondTime);

        TextView size5Third = (TextView)view.findViewById(R.id.size5ThirdTime);

        TextView size6First = (TextView)view.findViewById(R.id.size6FirstTime);

        TextView size6Second = (TextView)view.findViewById(R.id.size6SecondTime);

        TextView size6Third = (TextView)view.findViewById(R.id.size6ThirdTime);

        try {
            //get saved ranking data from the shared preference file
            int savedFirst4 = Setting.sharedPreferences.getInt("size4First",60);

            int savedSecond4 = Setting.sharedPreferences.getInt("size4Second", 60);

            int savedThird4 = Setting.sharedPreferences.getInt("size4Third", 60);

            int savedFirst5 = Setting.sharedPreferences.getInt("size5First", 60);

            int savedSecond5 = Setting.sharedPreferences.getInt("size5Second", 60);

            int savedThird5 = Setting.sharedPreferences.getInt("size5Third", 60);

            int savedFirst6 = Setting.sharedPreferences.getInt("size6First", 60);

            int savedSecond6 = Setting.sharedPreferences.getInt("size6Second", 60);

            int savedThird6 = Setting.sharedPreferences.getInt("size6Third", 60);

            //print all the ranking information to the text view in the fragment
            size4First.setText(Integer.toString(savedFirst4) + " Seconds");
            size4Second.setText(Integer.toString(savedSecond4) + " Seconds");
            size4Third.setText(Integer.toString(savedThird4) + " Seconds");
            size5First.setText(Integer.toString(savedFirst5) + " Seconds");
            size5Second.setText(Integer.toString(savedSecond5) + " Seconds");
            size5Third.setText(Integer.toString(savedThird5) + " Seconds");
            size6First.setText(Integer.toString(savedFirst6) + " Seconds");
            size6Second.setText(Integer.toString(savedSecond6) + " Seconds");
            size6Third.setText(Integer.toString(savedThird6) + " Seconds");
        }
        catch(ClassCastException c){
            Log.v("Error ", c.getMessage());
        }

        return view;
    }

}
