package com.game.seiya.a3_in_a_rowgame;

import android.content.Context;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.GridView;
import android.widget.ImageView;


public class ImageAdapter extends BaseAdapter {
    Item[] gridArray; //
    int layoutResourceId;
    private Context mContext;
    public ImageAdapter(Context c,Item[] gridArray ) {
        mContext = c;
        this.gridArray=gridArray;
    }
    public int getCount() {
        return gridArray.length;
    }
    public Item getItem(int position) {
        return null;
    }
    public long getItemId(int position) {
        return position;
    }
    // create a new ImageView for each item referenced by the Adapter
    public View getView(int position, View convertView, ViewGroup parent) {
        ImageView imageView;
        if (convertView == null) {
// if it's not recycled, initialize some attributes
            imageView = new ImageView(mContext);
            int width = ((GridView) parent).getColumnWidth();
            imageView.setLayoutParams(new GridView.LayoutParams(width,width));
            imageView.setScaleType(ImageView.ScaleType.FIT_XY);
            imageView.setPadding(0, 0, 0, 0);
        } else {
            imageView = (ImageView) convertView;
        }
        imageView.setImageResource(gridArray[position].getRDC());
        return imageView;
    }
}

