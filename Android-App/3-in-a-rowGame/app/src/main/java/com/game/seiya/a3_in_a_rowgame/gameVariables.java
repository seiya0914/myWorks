package com.game.seiya.a3_in_a_rowgame;

/**
 * Created by Seiya on 2016/06/13.
 */
public class gameVariables {
    //this class is to share all the variable that is needed throughout the application such as tiles' colour.
    //the colour variables are used in Game class, mainly.

    public static int FIRST_COLOUR;

    public static int SECOND_COLOUR;

    public static int GRID_SIZE;

    public static int GAME_TIME;

    public static void gameVariableAssign(String c1, String c2, String s, String d){

        switch (c1){
            case "Red":
                FIRST_COLOUR = R.mipmap.red;
                break;
            case "Blue":
                FIRST_COLOUR = R.mipmap.blue;
                break;
            case "Green":
                FIRST_COLOUR = R.mipmap.green;
                break;
            case "Orange":
                FIRST_COLOUR = R.mipmap.orange;
                break;
        }

        switch (c2){
            case "Red":
                SECOND_COLOUR = R.mipmap.red;
                break;
            case "Blue":
                SECOND_COLOUR = R.mipmap.blue;
                break;
            case "Green":
                SECOND_COLOUR = R.mipmap.green;
                break;
            case "Orange":
                SECOND_COLOUR = R.mipmap.orange;
                break;
        }

        switch (s){
            case "4 × 4":
                GRID_SIZE = 4;
                break;
            case "5 × 5":
                GRID_SIZE = 5;
                break;
            case "6 × 6":
                GRID_SIZE = 6;
                break;
        }

        switch (d){
            case "Easy":
                GAME_TIME = 60;
                break;
            case "Normal":
                GAME_TIME = 40;
                break;
            case "Hard":
                GAME_TIME = 20;
                break;
        }
    }
}
