import $ from 'jquery';
import React from 'react';
import Users from './users';
import Images from './images';
import Categories from './category';
import Contributors from './contributors';


export default class Stats extends React.Component {

    render() {

        let lang = $('html').attr('lang');

        return (
            <div className="block">
                <Images lang={lang}/>
                <Categories lang={lang}/>
                <Contributors lang={lang}/>
                <Users lang={lang}/>
            </div>
        )
    }
}