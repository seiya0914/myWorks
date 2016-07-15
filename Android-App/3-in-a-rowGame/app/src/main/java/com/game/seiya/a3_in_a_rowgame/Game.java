package com.game.seiya.a3_in_a_rowgame;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.CountDownTimer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.GridView;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;
import java.util.Arrays;
import java.util.Collection;
import java.util.Collections;
import java.util.Random;
import com.game.seiya.a3_in_a_rowgame.Setting;

public class Game extends AppCompatActivity {

    int colour1 = gameVariables.FIRST_COLOUR;

    int colour2 = gameVariables.SECOND_COLOUR;

    int gridSize = gameVariables.GRID_SIZE;

    int gameTime = gameVariables.GAME_TIME;

    long timeLeft;

    int c;

    Item[] gridArray = new Item[gridSize*gridSize];

    ImageAdapter iAdapter;

    GridView gridview;

    Context context;

    TextView timer;

    CountDownTimer Timer = new CountDownTimer(gameTime*1000,1000){
        public void onTick(long m){
            timer.setText("seconds remaining: " + m / 1000);
            timeLeft = m/1000;
        }

        public void onFinish(){
            timer.setText("Time is over!!");
            gridview.setEnabled(false);//when time is over, unable GridView to be tapped
        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_game);

        timer = (TextView)findViewById(R.id.timer);

        timer.setText("Click Start Button to Start");//by default, the text for timer is this

        if(colour1 == 0){
            colour1 = R.mipmap.red;
        }
        if(colour2 == 0){
            colour2 = R.mipmap.blue;
        }
        if(gridSize == 0){
            gridSize = 4;
        }

        c = colour1;

        context = getApplicationContext();

        gridview = (GridView) findViewById(R.id.gridview);

        gridview.setNumColumns(gridSize);

        for(int i=0;i<gridSize*gridSize;i++){
            gridArray[i] = new Item(R.mipmap.grey);
        }
        iAdapter = new ImageAdapter(context,gridArray);

        gridview.setAdapter(iAdapter);

        gridview.setEnabled(false);//at first, the gridview is not able to be coloured

        gridview.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v, int position, long id) {

                //if the grid is already colored, do not allow user to change color
                if(gridArray[position].getRDC() != colour1 && gridArray[position].getRDC() != colour2) {
                    ((ImageView) v).setImageResource(c);
                }

                //check the current color of color variable. if the variable c is equal to red Color, the switch stmt
                //changes the variable to blue.
                if(gridArray[position].getRDC() == R.mipmap.grey) { // if the clicked gridArray's colour for the Grid is equal to grey, change the colour.
                    if (c == colour1) {
                        c = colour2;
                        gridArray[position].RDC = colour1;
                    } else if (c == colour2) {
                        c = colour1;
                        gridArray[position].RDC = colour2;
                    }
                }

                //if player lose, unable to change colour anymore.
                if(verticalCheck() || horizontalCheck()){
                    gridview.setEnabled(false);//unable gridview to be changed colour

                    Timer.cancel();//when the player loses, the time stops counting down

                    //then display message with toast
                    Context context = getApplicationContext();
                    CharSequence text = "You Lose!!";
                    int duration = Toast.LENGTH_SHORT;
                    Toast toast = Toast.makeText(context, text, duration);
                    toast.show();
                }

                if(victoryCheck()){
                    //when the player wins the game, unable GridView to be tapped and the time stops as well
                    gridview.setEnabled(false);
                    Timer.cancel();
                    Log.v("TimeLeft: ",Long.toString(timeLeft));

                    Context context = getApplicationContext();
                    CharSequence text = "You Win!!";
                    int duration = Toast.LENGTH_SHORT;
                    Toast toast = Toast.makeText(context, text, duration);
                    toast.show();

                    //then check if the record could be either 1st, 2nd or 3rd
                    //but first check if the ranking record is blank or not
                    SharedPreferences sharedPreferences;
                    sharedPreferences = getSharedPreferences("GamePREFS",Context.MODE_PRIVATE);
                    SharedPreferences.Editor editor = sharedPreferences.edit();

                    long recordTime = gameVariables.GAME_TIME - timeLeft;

                    int savedFirst4 = sharedPreferences.getInt("size4First",60);

                    int savedSecond4 = sharedPreferences.getInt("size4Second", 60);

                    int savedThird4 = sharedPreferences.getInt("size4Third",60);

                    int savedFirst5 = sharedPreferences.getInt("size5First",60);

                    int savedSecond5 = sharedPreferences.getInt("size5Second",60);

                    int savedThird5 = sharedPreferences.getInt("size5Third",60);

                    int savedFirst6 = sharedPreferences.getInt("size6First",60);

                    int savedSecond6 = sharedPreferences.getInt("size6Second",0);

                    int savedThird6 = sharedPreferences.getInt("size6Third",0);
                    if(gameVariables.GRID_SIZE == 4){//check which size of grid the player playing
                        if(savedFirst4 > recordTime || savedFirst4 == 0) {
                            editor.putInt("size4Third", (int)savedSecond4);//if the new time record is recorded, the current first is down to the second
                            editor.putInt("size4Second",(int)savedFirst4);//and the same process for the second to third
                            editor.putInt("size4First", (int)recordTime);
                            editor.commit();
                        }
                        else if(savedSecond4 > recordTime || savedSecond4 == 0){
                            editor.putInt("size4Third", (int)savedSecond4);
                            editor.putInt("size4Second", (int)recordTime);
                            editor.commit();
                        }
                        else if(savedThird4 > recordTime || savedThird4 == 0){
                            editor.putInt("size4Third", (int)recordTime);
                            editor.commit();
                        }
                        Log.v("Record Time: ", Long.toString(recordTime));
                    }
                    else if(gameVariables.GRID_SIZE == 5){
                        if(savedFirst5 > recordTime || savedFirst5 == 0) {
                            editor.putInt("size5Third", (int)savedSecond5);//if the new time record is recorded, the current first is down to the second
                            editor.putInt("size5Second",(int)savedFirst5);//and the same process for the second to third
                            editor.putInt("size5First", (int)recordTime);
                            editor.commit();
                        }
                        else if(savedSecond5 > recordTime || savedSecond5 == 0){
                            editor.putInt("size5Third", (int)savedSecond5);
                            editor.putInt("size5Second", (int)recordTime);
                            editor.commit();
                        }
                        else if(savedThird5 > recordTime || savedThird5 == 0){
                            editor.putInt("size5Third", (int)recordTime);
                            editor.commit();
                        }
                        Log.v("Record Time: ", Long.toString(recordTime));
                    }
                    else if(gameVariables.GRID_SIZE == 6){
                        if(savedFirst6 > recordTime || savedThird6 == 0) {
                            editor.putInt("size6Third", (int)savedSecond6);//if the new time record is recorded, the current first is down to the second
                            editor.putInt("size6Second",(int)savedFirst6);//and the same process for the second to third
                            editor.putInt("size6First", (int)recordTime);
                            editor.commit();
                        }
                        else if(savedSecond6 > recordTime || savedThird6 == 0){
                            editor.putInt("size6Third", (int)savedSecond6);
                            editor.putInt("size6Second", (int)recordTime);
                            editor.commit();
                        }
                        else if(savedThird6 > recordTime || savedThird6 == 0){
                            editor.putInt("size6Third", (int)recordTime);
                            editor.commit();
                        }
                        Log.v("Record Time: ", Long.toString(recordTime));
                    }
                }


            }
        });

        //when start button is clicked, game starts and text is changed to timer
        final Button restartBtn = (Button)findViewById(R.id.restartBtn);
        restartBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                restartBtn.setText("Restart");
                gridview.setEnabled(true);
                for(int i = 0;i<4;i++){//Reset all the colours.
                    gridArray[i] = new Item(R.mipmap.grey);
                    gridview.setAdapter(iAdapter);
                    c = colour1;
                    Timer.start();
                    do {
                        randomStart();
                    }while(verticalCheck() || horizontalCheck());
                }
            }
        });

        Button backBtn = (Button)findViewById(R.id.backBtn);
        backBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(Game.this,HomeScreen.class);
                startActivity(i);
            }
        });

    }

    public boolean verticalCheck(){
        //Checking vertically
        boolean check = false;
        for(int i=0;i<=gridSize*(gridSize-3);i+=gridSize) {
            for (int j = 0; j <= gridSize-1; j++) {
                if (gridArray[j+i].getRDC() == gridArray[j + gridSize + i].getRDC() && gridArray[j + gridSize + i].getRDC() == gridArray[j + gridSize*2 + i].getRDC()
                        && gridArray[j + i].getRDC() != R.mipmap.grey && gridArray[j + gridSize + i].getRDC() != R.mipmap.grey && gridArray[j + gridSize*2 + i].getRDC() != R.mipmap.grey) {
                    check = true;
                }
            }
        }
        return check;
    }

    public boolean horizontalCheck(){
        boolean check = false;
        for(int j=0;j<=gridSize*(gridSize-1);j+=gridSize)
        {
            for (int i = 0; i <= gridSize-3; i++) {
                if (gridArray[i+j].getRDC() == gridArray[i + 1 + j].getRDC() && gridArray[i + 1 + j].getRDC() == gridArray[i + 2 + j].getRDC()
                        && gridArray[i + j].getRDC() != R.mipmap.grey && gridArray[i + 1 + j].getRDC() != R.mipmap.grey && gridArray[i + 2 + j].getRDC() != R.mipmap.grey) {
                    check = true;
                }

            }
        }
        return check;
    }

    public boolean victoryCheck(){//check if the player change all the tiles' colour without 3 in a row
        boolean check = true;
        for(int i=0;i<gridSize*gridSize;i++){
            if(gridArray[i].getRDC() == R.mipmap.grey){
                check = false;
            }
        }
        if(verticalCheck() || horizontalCheck()){
            check = false;
        }
        return check;
    }

    public Item[] randomStart(){//method to start a game with random generated coloured tiles
        Random r = new Random();

        Integer[] rand = new Integer[gridSize*gridSize];

        for(int i=0;i<rand.length;i++){
            rand[i] = i;
        }
        Collections.shuffle(Arrays.asList(rand));

        for(int i = 0; i<gridSize*gridSize; i++){
            gridArray[i] = new Item(R.mipmap.grey);
        }

       for(int i = 0;i<gridSize;i++){
           if(r.nextBoolean() == true){
               gridArray[rand[i]] = new Item(colour1);
           }
           else{
               gridArray[rand[i]] = new Item(colour2);
           }
       }

        return gridArray;
    }
}

