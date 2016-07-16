package com.game.seiya.a3_in_a_rowgame;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.AlphaAnimation;
import android.view.animation.Animation;
import android.widget.TextView;


/**
 * A simple {@link Fragment} subclass.
 */
public class HelpFragment extends Fragment {


    public HelpFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_help, container, false);

        TextView txt = (TextView)view.findViewById(R.id.textView8);
        TextView txt2 = (TextView)view.findViewById(R.id.textView9);

        //to keep the TextViews blinking
        Animation anim = new AlphaAnimation(0.0f,1.0f);
        anim.setDuration(700);
        anim.setStartOffset(20);
        anim.setRepeatCount(Animation.INFINITE);
        anim.setRepeatMode(Animation.REVERSE);
        txt.startAnimation(anim);
        txt2.startAnimation(anim);

        return view;
    }

}
