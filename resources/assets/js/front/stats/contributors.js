import React from 'react';

export default class Contributors extends React.Component {
    render() {

        const { lang } = this.props;

        return (
            <div className="stat">
                <div className="second">
                    <p>1234</p>
                </div>
                <h4>{lang === 'fr' ? 'Contributeurs' : 'Contributors'}</h4>
                <p>dolor sic amet mes couilles sur ton front</p>
            </div>
        )
    }
}