import React, { useState } from "react";
import VisibilitySensor from "react-visibility-sensor";
import { NoSsr } from "@material-ui/core";

const Lazy = props => {
  const { loading, children } = props;
  const [renderImage, setRenderImage] = useState(loading != "lazy");

  // We wrap the image in a container div and adjacent spacer that uses the provided aspect ratio to reserve space for the image so that surrounding
  // elements don’t shift around when it eventually loads.
  const wrap = <>{renderImage ? children : null}</>;
  const wrapNoSsr = <NoSsr>{children}</NoSsr>;

  const lazyLoad = visible => {
    if (visible) {
      setRenderImage(true);
    }
  };

  if (renderImage) {
    return wrap;
  } else {
    // we can discard the visibility sensor once the image is loaded
    return (
      <VisibilitySensor
        active={!renderImage}
        onChange={lazyLoad}
        partialVisibility
      >
        {wrapNoSsr}
      </VisibilitySensor>
    );
  }
};

export default Lazy;
