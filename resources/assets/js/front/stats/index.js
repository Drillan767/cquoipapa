import React from 'react';
import Users from './users';
import Images from './images';
import Categories from './category';
import Contributors from './contributors';


export default class Stats extends React.Component {
    render() {
        return (
            <div className="block">
                <Images/>
                <Categories/>
                <Contributors/>
                <Users/>
            </div>
        )
    }
}