import React from 'react';

export default class Users extends React.Component {

    render() {

        const { lang } = this.props;

        return (
            <div className="stat">
                <div className="fourth">
                    <p>1234</p>
                </div>

                <h4>{lang === 'fr' ? 'Utilisateurs' : 'Users'}</h4>
                <p>dolor sic amet mes couilles sur ton front</p>

            </div>
        )
    }
}