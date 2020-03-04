package com.indian11.app.FragmentBottomMenu;

import android.content.Context;
import android.os.Bundle;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.content.ContextCompat;
import android.support.v4.view.PagerAdapter;
import android.support.v4.view.ViewPager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.indian11.app.APICallingPackage.Class.APIRequestManager;
import com.indian11.app.APICallingPackage.Interface.ResponseManager;
import com.indian11.app.Bean.BeanBanner;
import com.indian11.app.Config;
import com.indian11.app.HomeTabsFragment.FragmentFixtures;
import com.indian11.app.HomeTabsFragment.FragmentLive;
import com.indian11.app.HomeTabsFragment.FragmentResults;
import com.indian11.app.R;
import com.indian11.app.SessionManager;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

import static com.indian11.app.Config.HOMEBANNER;
import static com.indian11.app.Constants.HOMEBANNERTYPE;
import static com.facebook.FacebookSdk.getApplicationContext;


public class HomeFragment extends Fragment implements ResponseManager {


    private TabLayout tabLayout;
    private ViewPager viewPager;

    ViewPager VP_Slider;
    LinearLayout sliderDotspanel;
    private int dotscount;
    private ImageView[] dots;
    BannerAdapter bannerAdapter;

    ResponseManager responseManager;
    APIRequestManager apiRequestManager;
    SessionManager sessionManager;
    CollapsingToolbarLayout collapse_toolbar;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
      View v = inflater.inflate(R.layout.fragment_home, container, false);

        responseManager = this;
        apiRequestManager = new APIRequestManager(getActivity());
        sessionManager = new SessionManager();


        viewPager = v.findViewById(R.id.viewpager);
        VP_Slider = v.findViewById(R.id.VP_Slider);
        sliderDotspanel = v.findViewById(R.id.SliderDots);
        collapse_toolbar = v.findViewById(R.id.collapse_toolbar);
        setupViewPager(viewPager);

        tabLayout = v.findViewById(R.id.FragmentTab);
        tabLayout.setupWithViewPager(viewPager);


        FragmentManager fragmentManager = getActivity().getSupportFragmentManager();
        android.support.v4.app.FragmentTransaction transaction = fragmentManager.beginTransaction();
        transaction.replace(R.id.viewpager, new FragmentFixtures());
        transaction.commit();
        viewPager.setOffscreenPageLimit(2);
        callHomeBanner(false);

        return v;
    }

    private void setupViewPager(ViewPager viewPager) {
        ViewPagerAdapter adapter = new ViewPagerAdapter(getActivity().getSupportFragmentManager());
        adapter.addFragment(new FragmentFixtures(), "FIXTURES");
        adapter.addFragment(new FragmentLive(), "LIVE");
        adapter.addFragment(new FragmentResults(), "RESULTS");
        viewPager.setAdapter(adapter);
    }

    private void callHomeBanner(boolean isShowLoader) {
        try {

            apiRequestManager.callAPI(HOMEBANNER,
                    createRequestJson(), getActivity(), getActivity(), HOMEBANNERTYPE,
                    isShowLoader,responseManager);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    JSONObject createRequestJson() {
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("user_id", sessionManager.getUser(getActivity()).getUser_id());

        } catch (JSONException e) {
            e.printStackTrace();
        }
        return jsonObject;
    }

    @Override
    public void getResult(Context mContext, String type, String message, JSONObject result) {

        collapse_toolbar.setVisibility(View.VISIBLE);

        try {
            JSONArray jsonArray = result.getJSONArray("data");
            List<BeanBanner> beanHomeFixtures = new Gson().fromJson(jsonArray.toString(),
                    new TypeToken<List<BeanBanner>>() {
                    }.getType());
            bannerAdapter = new BannerAdapter(beanHomeFixtures, getActivity());
            VP_Slider.setAdapter(bannerAdapter);

            dotscount = bannerAdapter.getCount();
            dots = new ImageView[dotscount];

            for(int i = 0; i < dotscount; i++){

                dots[i] = new ImageView(getActivity());
                dots[i].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(),
                        R.drawable.non_active_dot));

                LinearLayout.LayoutParams params = new
                        LinearLayout.LayoutParams(LinearLayout.LayoutParams.WRAP_CONTENT,
                        LinearLayout.LayoutParams.WRAP_CONTENT);

                params.setMargins(8, 0, 8, 0);

                sliderDotspanel.addView(dots[i], params);

            }

            dots[0].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(),
                    R.drawable.active_dot));

            VP_Slider.addOnPageChangeListener(new ViewPager.OnPageChangeListener() {
                @Override
                public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

                }

                @Override
                public void onPageSelected(int position) {

                    for(int i = 0; i< dotscount; i++){
                        dots[i].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(),
                                R.drawable.non_active_dot));
                    }

                    dots[position].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(),
                            R.drawable.active_dot));

                }

                @Override
                public void onPageScrollStateChanged(int state) {

                }
            });

        }
        catch (Exception e){
            e.printStackTrace();
        }
        bannerAdapter.notifyDataSetChanged();

    }

    @Override
    public void getResult2(Context mContext, String type, String message, JSONObject result) {

    }

    @Override
    public void onError(Context mContext, String type, String message) {

        collapse_toolbar.setVisibility(View.GONE);
    }


    class ViewPagerAdapter extends FragmentPagerAdapter {
        private final List<Fragment> mFragmentList = new ArrayList<>();
        private final List<String> mFragmentTitleList = new ArrayList<>();

        public ViewPagerAdapter(FragmentManager manager) {
            super(manager);
        }

        @Override
        public Fragment getItem(int position) {
            return mFragmentList.get(position);
        }

        @Override
        public int getCount() {
            return mFragmentList.size();
        }

        public void addFragment(Fragment fragment, String title) {
            mFragmentList.add(fragment);
            mFragmentTitleList.add(title);
        }

        @Override
        public CharSequence getPageTitle(int position) {
            return mFragmentTitleList.get(position);
        }
    }

    public class BannerAdapter extends PagerAdapter {
        private Context context;
        private LayoutInflater layoutInflater;
        private List<BeanBanner> mListenerList;

        public BannerAdapter(List<BeanBanner> mListenerList, Context context) {
            this.context = context;
            this.mListenerList = mListenerList;
        }

        @Override
        public int getCount() {
            return mListenerList.size();
        }

        @Override
        public boolean isViewFromObject(View view, Object object) {
            return view == object;
        }

        @Override
        public Object instantiateItem(ViewGroup container, final int position) {

            layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            View view = layoutInflater.inflate(R.layout.slider_banner, null);

            ImageView imageView = view.findViewById(R.id.im_banner);

            String Imagename = mListenerList.get(position).getBanner_image();
            final String Type = mListenerList.get(position).getType();

            Glide.with(getActivity()).load(Config.BANNERIMAGE+Imagename)
                    .crossFade()
                    .diskCacheStrategy(DiskCacheStrategy.ALL)
                    .into(imageView);

            ViewPager vp = (ViewPager) container;
            vp.addView(view, 0);


            imageView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                   /* if (Type.equals("2")){
                        Intent i = new Intent(getActivity(), InviteFriendsActivity.class);
                        startActivity(i);
                    }*/

                }
            });



            return view;

        }

        @Override
        public void destroyItem(ViewGroup container, int position, Object object) {

            ViewPager vp = (ViewPager) container;
            View view = (View) object;
            vp.removeView(view);

        }
    }
}
