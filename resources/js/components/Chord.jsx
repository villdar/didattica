import React from 'react'
import { ResponsiveChord } from '@nivo/chord';



function Chord(props) {

  const Chord = ({ combinedMatrix, onClick, tag_keys, colors }) => (
    <ResponsiveChord
      matrix={combinedMatrix}
      keys={tag_keys}
      margin={{ top: 30, right: 60, bottom: 60, left: 60 }}
      valueFormat="0"
      padAngle={0.02}
      innerRadiusRatio={0.96}
      innerRadiusOffset={0.02}
      arcOpacity={1}
      arcBorderWidth={1}
      arcBorderColor={{ from: 'color', modifiers: [['darker', 0.4]] }}
      ribbonOpacity={0.5}
      ribbonBorderWidth={1}
      ribbonBorderColor={{ from: 'color', modifiers: [['darker', 0.4]] }}
      enableLabel={false}
      label="id"
      labelOffset={15}
      labelRotation={190}
      labelTextColor={{ from: 'color', modifiers: [['darker', 1]] }}
      colors={colors}
      isInteractive={true}
      arcHoverOpacity={1}
      arcHoverOthersOpacity={0.25}
      ribbonHoverOpacity={0.75}
      ribbonHoverOthersOpacity={0.25}
      onRibbonClick={onClick}
      onArcClick={onClick} // <--------- NEW
      animate={true}
      motionStiffness={90}
      motionDamping={7}
    //   legends={[
    //     {
    //       anchor: 'left',
    //       direction: 'column',
    //       justify: false,
    //       translateX: -50,
    //       translateY: 100,
    //       itemWidth: 80,
    //       itemHeight: 14,
    //       itemsSpacing: 0,
    //       itemTextColor: '#999',
    //       itemDirection: 'left-to-right',
    //       symbolSize: 12,
    //       symbolShape: 'circle',
    //       effects: [
    //         {
    //           on: 'hover',
    //           style: {
    //             itemTextColor: '#000',
    //           },
    //         },
    //       ],
    //     },
    //   ]}
    />
  )

  return (
    <Chord
        matrix={props.matrix}
        path={props.path}
        colors={props.colors}
        keys={props.keys}
        onClick={(data) => props.hideOnClick(data.id)}
    />
  )
}

export default Chord
