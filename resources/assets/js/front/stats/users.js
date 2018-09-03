import React from 'react';

export default class Users extends React.Component {

    render() {

        const { lang, users } = this.props;

        return (
            <div className="stat">
                <div className="fourth">
                    <p>{ users }</p>
                </div>

                <h4>Clients</h4>
                <p>Profitent de nos services. Soyez l'un d'entre eux !</p>

            </div>
        )
    }
}