import React from "react";

const Switch = props => {
  const { children, reqRoute, reqProps } = props;
  const ReqComponent = children.find(
    component => reqRoute === component.props.route
  );
  return React.cloneElement(
    ReqComponent,
    { data: reqProps },
    ReqComponent.props.children
  );
};

export default Switch;
