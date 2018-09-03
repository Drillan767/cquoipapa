import $ from 'jquery';
import React from 'react';
import Users from './users';
import Images from './images';
import Categories from './category';
import Contributors from './contributors';


export default class Stats extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            numbers: null
        };
    }

    componentDidMount() {
        let self = this;
        $.get('/api/v1/overall', function (values) {
            self.setState({numbers: values});
        })
    }

    render() {

        let lang = $('html').attr('lang');
        const numbers = this.state.numbers;
        console.log(numbers);

        return (
            numbers !== null &&
            <div className="block">
                <Images lang={lang} images={numbers.images} />
                <Categories lang={lang} categories={numbers.categories} />
                <Contributors lang={lang} contr={numbers.contributors} />
                <Users lang={lang} users={numbers.users} />
            </div>

        )
    }
}