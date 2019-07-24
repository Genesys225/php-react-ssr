import React from "react";
import { makeStyles } from "@material-ui/core/styles";
import GridList from "@material-ui/core/GridList";
import GridListTile from "@material-ui/core/GridListTile";
import CountryItem from "./CountryItem";

const useStyles = makeStyles(theme => ({
  root: {
    display: "flex",
    flexWrap: "wrap",
    justifyContent: "space-around",
    overflow: "hidden",
    backgroundColor: theme.palette.background.paper
  }
}));

export default function ImageGridList(props) {
  const countriesList = Object.values(props.data);

  const classes = useStyles();
  return (
    <div className={classes.root}>
      <GridList cellHeight={220} className={classes.gridList} cols={2}>
        {countriesList.map(country => (
          <GridListTile key={country.Code2} cols={1}>
            <CountryItem {...country} />
          </GridListTile>
        ))}
      </GridList>
    </div>
  );
}
