package com.game.seiya.a3_in_a_rowgame;


import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.AlphaAnimation;
import android.view.animation.Animation;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.SeekBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import org.w3c.dom.Text;


/**
 * A simple {@link Fragment} subclass.
 */
public class SettingFragment extends Fragment {


    public SettingFragment() {
        // Required empty public constructor
    }

    //Default values//////////
    String savedColour1 = "Red";

    String savedColour2 = "Blue";

    String savedSize = "4";

    String savedDiff = "Easy";
    /////////////////////////////
    ImageView colour1;

    ImageView colour2;

    public static int COLOUR_1;

    public static int COLOUR_2;

    public static int SIZE;

    public static int DIFF;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        final View view = inflater.inflate(R.layout.fragment_setting, container, false);

        TextView txt = (TextView)view.findViewById(R.id.textView7);

        //sharedPreferences = getSharedPreferences(GAME_PREFS, Context.MODE_PRIVATE);

        savedColour1 = Setting.sharedPreferences.getString("Colour1","");

        savedColour2 = Setting.sharedPreferences.getString("Colour2","");

        savedSize = Setting.sharedPreferences.getString("Size","");

        savedDiff = Setting.sharedPreferences.getString("Diff","");

        colour1 = (ImageView)view.findViewById(R.id.colourDemo1);

        colour2 = (ImageView)view.findViewById(R.id.colourDemo2);

        final Spinner s1 = (Spinner)view.findViewById(R.id.firstColour);

        final Spinner s2 = (Spinner)view.findViewById(R.id.secondColour);

        final Spinner s3 = (Spinner)view.findViewById(R.id.GridSize);

        final Spinner s4 = (Spinner)view.findViewById(R.id.difficulty);

        Button submit = (Button)view.findViewById(R.id.submitBtn);

        final TextView txtHelp = (TextView)view.findViewById(R.id.txtHelp);

        ArrayAdapter<CharSequence> adapter1 = ArrayAdapter.createFromResource(getActivity(),R.array.colours,android.R.layout.simple_spinner_dropdown_item);
        ArrayAdapter<CharSequence> adapter2 = ArrayAdapter.createFromResource(getActivity(),R.array.colours,android.R.layout.simple_spinner_dropdown_item);
        ArrayAdapter<CharSequence> adapter3 = ArrayAdapter.createFromResource(getActivity(),R.array.size,android.R.layout.simple_spinner_dropdown_item);
        ArrayAdapter<CharSequence> adapter4 = ArrayAdapter.createFromResource(getActivity(),R.array.diff,android.R.layout.simple_spinner_dropdown_item);

        s1.setAdapter(adapter1);
        s2.setAdapter(adapter2);
        s3.setAdapter(adapter3);
        s4.setAdapter(adapter4);

        Animation anim = new AlphaAnimation(0.0f,1.0f);
        anim.setDuration(700);
        anim.setStartOffset(20);
        anim.setRepeatCount(Animation.INFINITE);
        anim.setRepeatMode(Animation.REVERSE);
        txt.startAnimation(anim);

        //the switch staments below are to get value from sharedprefrence file and put data into the spinners
        switch (savedColour1){
            case "Red":
                s1.setSelection(0);
                break;
            case "Blue":
                s1.setSelection(1);
                break;
            case "Green":
                s1.setSelection(2);
                break;
            case "Orange":
                s1.setSelection(3);
                break;
            default:
                s1.setSelection(0);
        }

        switch (savedColour2){
            case "Red":
                s2.setSelection(0);
                break;
            case "Blue":
                s2.setSelection(1);
                break;
            case "Green":
                s2.setSelection(2);
                break;
            case "Orange":
                s2.setSelection(3);
                break;
            default:
                s1.setSelection(1);
        }

        switch (savedSize){
            case "4 × 4":
                s3.setSelection(0);
                break;
            case "5 × 5":
                s3.setSelection(1);
                break;
            case "6 × 6":
                s3.setSelection(2);
                break;
            default:
                s3.setSelection(0);
                break;
        }

        switch (savedDiff){
            case "Easy":
                s4.setSelection(0);
                break;
            case "Normal":
                s4.setSelection(1);
                break;
            case "Hard":
                s4.setSelection(2);
                break;
            default:
                s4.setSelection(0);
                break;
        }

        //if one of the colour is selected, the demo image is displayed above the colour selection spinner.
        //these two ItemSelectedListener are for it.
        s1.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {// listener for colour 1 spinner
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                savedColour1 = (String)s1.getSelectedItem();
                switch (savedColour1){
                    case "Red":
                        colour1.setImageResource(R.mipmap.red);
                        COLOUR_1 = R.mipmap.red;
                        break;
                    case "Blue":
                        colour1.setImageResource(R.mipmap.blue);
                        COLOUR_1 = R.mipmap.blue;
                        break;
                    case "Green":
                        colour1.setImageResource(R.mipmap.green);
                        COLOUR_1 = R.mipmap.green;
                        break;
                    case "Orange":
                        colour1.setImageResource(R.mipmap.orange);
                        COLOUR_1 = R.mipmap.orange;
                        break;
                    default:
                        colour1.setImageResource(R.mipmap.red);
                        COLOUR_1 = R.mipmap.red;
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                //if user select none of items
            }
        });

        s2.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {// listener for colour 2 spinner
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                savedColour2 = (String)s2.getSelectedItem();
                switch (savedColour2){
                    case "Red":
                        colour2.setImageResource(R.mipmap.red);
                        COLOUR_2 = R.mipmap.red;
                        break;
                    case "Blue":
                        colour2.setImageResource(R.mipmap.blue);
                        COLOUR_2 = R.mipmap.blue;
                        break;
                    case "Green":
                        colour2.setImageResource(R.mipmap.green);
                        COLOUR_2 = R.mipmap.green;
                        break;
                    case "Orange":
                        colour2.setImageResource(R.mipmap.orange);
                        COLOUR_2 = R.mipmap.orange;
                        break;
                    default:
                        colour2.setImageResource(R.mipmap.blue);
                        COLOUR_2 = R.mipmap.blue;
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                //if user select none of items
            }
        });

        s3.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {// listener for GridSize spinner
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                savedSize = (String)s3.getSelectedItem();
                switch (savedSize){
                    case "4 × 4":
                        SIZE = 4;
                        break;
                    case "5 × 5":
                        SIZE = 5;
                        break;
                    case "6 × 6":
                        SIZE = 6;
                        break;
                    default:
                        SIZE = 4;
                        break;

                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                //if user select none of items
            }
        });

        s4.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {// listener for GridSize spinner
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                savedDiff = (String)s4.getSelectedItem();

                switch (savedDiff){
                    case "Easy":
                        DIFF = 60;
                        break;
                    case "Normal":
                        DIFF = 40;
                        break;
                    case "Hard":
                        DIFF = 20;
                        break;
                    default:
                        DIFF = 60;
                        break;
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                //if user select none of items
            }
        });

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //if the two colour selected are the same, the program do not assign the colour information to global colour variable.
                if(savedColour1 == savedColour2){
                    Context context = getActivity();
                    CharSequence text = "Please select different colours";
                    int duration = Toast.LENGTH_SHORT;
                    Toast toast = Toast.makeText(context, text, duration);
                    toast.show();
                }
                else{
                    //if the colours selected are different, save the colours into sharedpreference file and assign the colours to Variables in gameVariables Class.
                    SharedPreferences.Editor editor = Setting.sharedPreferences.edit();
                    editor.putString("Colour1",savedColour1);
                    editor.putString("Colour2",savedColour2);
                    editor.putString("Size",savedSize);
                    editor.putString("Diff",savedDiff);
                    editor.commit();

                    gameVariables.FIRST_COLOUR = COLOUR_1;
                    gameVariables.SECOND_COLOUR = COLOUR_2;
                    gameVariables.GRID_SIZE = SIZE;
                    gameVariables.GAME_TIME = DIFF;

                    Context context = getActivity();
                    CharSequence text = "Saved";
                    int duration = Toast.LENGTH_SHORT;
                    Toast toast = Toast.makeText(context, text, duration);
                    toast.show();
                }
            }


         });

        return view;
    };
}
