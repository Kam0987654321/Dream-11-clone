package com.indian11.app.FragmentBottomMenu;


import android.os.Bundle;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.indian11.app.MyTabFragment.FragmentMyFixtures;
import com.indian11.app.MyTabFragment.FragmentMyLive;
import com.indian11.app.MyTabFragment.FragmentMyResults;
import com.indian11.app.R;

import java.util.ArrayList;
import java.util.List;

public class MyContestFragment extends Fragment {

    private TabLayout FragmentMyTab;
    private ViewPager myviewpager;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View v =inflater.inflate(R.layout.fragment_my_contest, container, false);

        myviewpager = v.findViewById(R.id.myviewpager);
        setupViewPager(myviewpager);

        FragmentMyTab = v.findViewById(R.id.FragmentMyTab);
        FragmentMyTab.setupWithViewPager(myviewpager);

        FragmentManager fragmentManager = getActivity().getSupportFragmentManager();
        android.support.v4.app.FragmentTransaction transaction = fragmentManager.beginTransaction();
        transaction.replace(R.id.myviewpager, new FragmentMyFixtures());
        transaction.commit();
        myviewpager.setOffscreenPageLimit(2);
        return v;
    }

    private void setupViewPager(ViewPager viewPager) {
        MyViewPagerAdapter adapter = new MyViewPagerAdapter(getActivity().getSupportFragmentManager());
        adapter.addFragment(new FragmentMyFixtures(), "FIXTURES");
        adapter.addFragment(new FragmentMyLive(), "LIVE");
        adapter.addFragment(new FragmentMyResults(), "RESULTS");
        viewPager.setAdapter(adapter);
    }

    class MyViewPagerAdapter extends FragmentPagerAdapter {
        private final List<Fragment> mFragmentList = new ArrayList<>();
        private final List<String> mFragmentTitleList = new ArrayList<>();

        public MyViewPagerAdapter(FragmentManager manager) {
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

}
